@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.verify_your_email_address')</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">@lang('auth.verify_email_address_t')</div>
                    @endif
                    @lang('auth.verify_email_address_t2')
                    @lang('auth.verify_email_address_t3')
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">@lang('auth.verify_email_address_btn')</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
