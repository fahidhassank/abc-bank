@extends('layouts.app')
@section('title', 'ABC Bank')
@section('content')
    <div class="container">
        <div class="card">
            <div class="p-4 fs-5">Statement of account</div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DATETIME</th>
                            <th>AMOUNT</th>
                            <th>TYPE</th>
                            <th>DETAILS</th>
                            <th class="text-end">BALANCE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($transactions->count() == 0)
                            <tr>
                                <td colspan="100%" class="text-center text-muted">No transactions</td>
                            </tr>
                        @endif
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Carbon\Carbon::parse($transaction->created_at)->format('d-m-Y h:i A') }}</td>
                                <td>{{ currencyFormat($transaction->amount) }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->details }}</td>
                                <td class="text-end">{{ currencyFormat($transaction->balance) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $transactions->links() }}
        </div>
    </div>
@endsection
