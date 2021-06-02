{{-- 繼承模板 --}}
@extends('layouts/frameWithNav')

{{-- 此為模板中headadd部分 --}}
@section('headadd')
    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}
@endsection

{{-- 此為模板中content部分 --}}
@section('content')

    <h1 style="padding: 20px;">
        歡迎進入後台系統
    </h1>

@endsection

