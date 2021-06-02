<!DOCTYPE html>
<html >
<head>
    
	@include('layouts/head')
	    
    <!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<!-- Theme style 以 boostrap4.css 修改 -->
    <link rel="stylesheet" href="{{ asset('plugins/adminLTE_dist/css/adminlte.min.css')}}">

    {{-- 自訂義 Nav 格式 --}}
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    
    <!-- Bootstrap -->
	{{-- <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script> --}}
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
	<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
	<script src="{{ asset('plugins/adminLTE_dist/js/adminlte.js')}}"></script>
	{{-- <script src="{{ asset('plugins/adminLTE_dist/js/demo.js')}}"></script> --}}

    {{-- 表示是匯入此模板後,可編輯部分 --}}
    @yield('headadd')

    
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
    {{-- 如果要預設 nav 縮起來 body class 新增 sidebar-collapse  --}}

    {{-- 彈跳視窗 --}}
	@include('layouts/popup')


    {{-- nav  --}}
    <div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item d-none d-sm-inline-block">
					<div  class="nav-link" id="userQuotaDiv">管理者</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="home" class="brand-link">
				<!-- <img src="" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
				<span class="brand-text">{{ env('APP_NAME') }}後台</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						
						<li class="nav-item @yield('nav_users')">
							<a href="#" class="nav-link">
								<i class="fas fa-users"></i>
								<p>
									帳號管理
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="user_list" class="nav-link @yield('nav_users_list')">
										<i class="fas fa-user-tag"></i>
										<p>會員資訊</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="login_list" class="nav-link @yield('nav_users_login')">
										<i class="fas fa-list"></i>
										<p>登入紀錄表</p>
									</a>
                                </li>
							</ul>
						</li>
						
						<li class="nav-item @yield('nav_point')">
							<a href="point_list" class="nav-link">
								<i class="fas fa-sign-out-alt"></i>
								<p>
									點數紀錄報表
								</p>
							</a>
						</li>

						<li class="nav-item @yield('nav_set')">
							<a href="#" class="nav-link ">
								<i class="fas fa-cog"></i>
								<p>
									設定
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="pw_change" class="nav-link @yield('nav_set_pw')">
										<i class="fas fa-key"></i>
										<p>修改密碼</p>
									</a>
								</li>
							</ul>
						</li>
                        <li class="nav-item">
							<a href="logout" class="nav-link">
								<i class="fas fa-sign-out-alt"></i>
								<p>
									登出
								</p>
							</a>
						</li>
						
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

            {{-- 表示是匯入此模板後,可編輯部分 --}}
            @yield('content')


        </div>

	</div>
	<!-- ./wrapper -->
    
    
</body>
</html>