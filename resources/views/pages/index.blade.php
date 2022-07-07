@extends('layout')
@section('footer', '')

@push('css')
    <link rel="stylesheet" href="{{ mix('styles/compiled/pages/home.min.css') }}">
@endpush
@section('content')
    <div class="container">
        @include('blocks.left_menu')
    </div>
@endsection
