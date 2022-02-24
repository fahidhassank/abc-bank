<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\ApiHelper;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\TransactionHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
	use ApiHelper;

	public function statement(Request $request)
	{
		$transactions = $request->user()->transactions()->latest()->paginate(5);
		return view('statement', compact('transactions'));
	}

	public function deposit(Request $request)
	{
		$this->validate($request, [
			'amount' => 'required|numeric|gt:0'
		]);

		try {
			DB::beginTransaction();
			$user = $request->user();
			TransactionHelper::deposit($user, $request->amount, 'Deposit');
			DB::commit();
			return $this->sendResponse(true, [], 'Money deposited successfully');
		} catch (\Throwable $e) {
			DB::rollBack();
			throw $e;
			return $this->sendResponse(false, [], "Couldn't transfer deposit");
		}
	}

	public function withdraw(Request $request)
	{
		$this->validate($request, [
			'amount' => 'required|numeric|gt:0'
		]);

		try {
			DB::beginTransaction();

			$user = $request->user();
			if ($user->balance < $request->amount) {
				DB::rollBack();
				throw ValidationException::withMessages(['amount' => ["You don't have enough money in your account"]]);
			}

			TransactionHelper::withdraw($user, $request->amount, 'Withdraw');

			DB::commit();
			return $this->sendResponse(true, [], 'Money withdrawed successfully');
		} catch (\Throwable $e) {
			DB::rollBack();
			throw $e;
			return $this->sendResponse(false, [], "Couldn't withdraw money");
		}
	}

	public function transfer(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email|exists:users',
			'amount' => 'required|numeric|gt:0'
		], [
			'email.exists' => 'Email not found'
		]);

		if ($request->user()->email == $request->email) {
			throw ValidationException::withMessages(['amount' => ["You cannot transfer money to yourself"]]);
		}

		try {
			DB::beginTransaction();

			$sender = $request->user();
			$receiver = User::where('email', $request->email)->first();

			if ($sender->balance < $request->amount) {
				DB::rollBack();
				throw ValidationException::withMessages(['email' => ["You don't have enough money in your account"]]);
			}

			TransactionHelper::withdraw($sender, $request->amount, 'Transfer to ' . $receiver->email);
			TransactionHelper::deposit($receiver, $request->amount, 'Transfer from ' . $sender->email);

			DB::commit();
			return $this->sendResponse(true, [], 'Money transfered successfully');
		} catch (\Throwable $e) {
			DB::rollBack();
			throw $e;
			return $this->sendResponse(false, [], "Couldn't transfer money");
		}
	}
}
