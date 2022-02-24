@extends('layouts.app')
@section('title', 'ABC Bank')
@section('content')
    <div class="container">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item fs-5">Welcome {{ auth()->user()->name }}</li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 text-muted">YOUR ID</div>
                        <div class="col-md-8">{{ auth()->user()->email }}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 text-muted">YOUR BALANCE</div>
                        <div class="col-md-8">{{ currencyFormat(auth()->user()->balance) }} INR</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
