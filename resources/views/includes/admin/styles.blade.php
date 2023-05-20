<!-- Meta data -->
<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<meta content="" name="description">
<meta content="" name="author">
<meta name="keywords" content=""/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Title -->
<title></title>



<!--Favicon -->
<link rel="icon" href="{{asset('uploads/logo/favicons/favicon.ico')}}" type="image/x-icon"/>




<!-- Bootstrap css -->
<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />


<!-- Style css -->
<link href="{{asset('assets/css/style.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
<link href="{{asset('assets/css/updatestyles.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
<link href="{{asset('assets/css/dark.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
<link href="{{asset('assets/css/skin-modes.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- Animate css -->
<link href="{{asset('assets/css/animated.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

<!--Sidemenu css -->
<link href="{{asset('assets/css/sidemenu.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- P-scroll bar css-->
<link href="{{asset('assets/plugins/p-scrollbar/p-scrollbar.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

<!---Icons css-->
<link href="{{asset('assets/css/icons.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- Select2 css -->
<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

<!--INTERNAL Toastr css -->
<link href="{{asset('assets/plugins/toastr/toastr.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

<!--INTERNAL Ratings css -->
<link href="{{asset('assets/plugins/ratings/jquerystarrating.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
<link href="
https://cdn.jsdelivr.net/npm/phosphor-icons@1.4.2/src/css/icons.min.css
" rel="stylesheet">

@yield('styles')

		
