{{-- 繼承模板 --}}
@extends('layouts/frame')

{{-- 此為模板中headadd部分 --}}
@section('headadd')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

{{-- 此為模板中content部分 --}}
@section('content')

    <br>
    <br>
    <br>

    <h1>{{ env('APP_NAME') }}</h1>
    <h4>後台管理</h4>

    {{-- 登入錯誤回傳訊息檢查 --}}
    @if ($errors->any())
		@foreach ($errors->all() as $error)
            <p class="error_info">{{ $error }}</p>
            @break
		@endforeach
    @endif


    <div class="formDiv">
        <form action="" method="post">
            {{csrf_field()}}
            <input type="text" name="account" required class="text" placeholder="帳號" maxlength=15/>
            <input type="password" name="password" required class="text" placeholder="密碼" maxlength=15/>
            <input class="goLogin" type="submit" value="登  入"/>
            <a href=""><input class="signup" type="button" value="註  冊"/></a>
        </form>
    </div>

    <script>
        $('form').submit(function() {
			$('.goLogin').attr('disabled', true);
			$('.signup').attr('disabled', true);
        });
        
        $('.signup').click(function() {
			$('.goLogin').attr('disabled', true);
            $('.signup').attr('disabled', true);
		});

    </script>

@endsection

