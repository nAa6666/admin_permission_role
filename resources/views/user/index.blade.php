@extends('layout')

@section('content')
<div class="container-fluid">
    <p class="title-cab">Личный кабинет</p>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
    </div>
</div>
@endsection
