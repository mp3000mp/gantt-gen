@extends('layouts.app')

@section('title')
    Account
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Account</h1>

                <h2>{{ $user->name }} ({{ $user->profile->name }})</h2>

                <p><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>

            </div>
        </div>
    </div>
@endsection
