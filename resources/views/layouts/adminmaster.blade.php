<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
	<head>
    	@include('includes.admin.styles')

		
		
	</head>

	<body class="app sidebar-mini @if(Auth::check() && Auth::user()->darkmode == 1) dark-mode @endif">

		<div class="page">
			<div class="page-main">
					@include('includes.admin.verticalmenu')
					<div class="app-content main-content">
						<div class="side-app">
							@include('includes.admin.menu')

							@yield('content')

						</div>
					</div><!-- end app-content-->
			</div>
			@include('includes.admin.footer')

		</div>

    	@include('includes.admin.scripts')

	@if (Session::has('error'))
		<script>
			toastr.error("{!! Session::get('error') !!}");
		</script>
	@elseif(Session::has('success'))
		<script>
			toastr.success("{!! Session::get('success') !!}");
		</script>
	@elseif(Session::has('info'))
		<script>
			toastr.info("{!! Session::get('info') !!}");
		</script>
	@elseif(Session::has('warning'))
		<script>
			toastr.warning("{!! Session::get('warning') !!}");
		</script>
	@endif

		@yield('modal')

	</body>
</html>