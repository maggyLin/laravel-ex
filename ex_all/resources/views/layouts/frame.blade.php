<!DOCTYPE html>
<html >
<head>
    
    @include('layouts/head')

    {{-- 表示是匯入此模板後,可編輯部分 --}}
    @yield('headadd')
    
</head>
<body>

    {{-- 彈跳視窗 --}}
    @include('layouts/popup')


    {{-- 表示是匯入此模板後,可編輯部分 --}}
    @yield('content')
    
</body>
</html>