<?php

namespace App\Helpers;

trait TransactionHelper
{
	public static function deposit($user, $amount, $details)
	{
		$user->balance = $user->balance + $amount;
		$user->save();

		$user->transactions()->create([
			'type' => 'Credit',
			'details' => $details,
			'amount' => $amount,
			'balance' => $user->balance
		]);
	}

	public static function withdraw($user, $amount, $details)
	{
		$user->balance = $user->balance - $amount;
		$user->save();

		$user->transactions()->create([
			'type' => 'Debit',
			'details' => $details,
			'amount' => $amount,
			'balance' => $user->balance
		]);
	}
}
