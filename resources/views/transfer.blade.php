@extends('layouts.app')
@section('title', 'ABC Bank')
@section('content')
    <div class="container">
        <div class="card">
            <div class="p-4 fs-5 border-bottom">Transfer Money</div>
            <div class="card-body">
                <transfer-money></transfer-money>
            </div>
        </div>
    </div>
@endsection
