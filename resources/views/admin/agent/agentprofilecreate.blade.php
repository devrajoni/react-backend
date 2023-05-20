
@extends('layouts.adminmaster')

		@section('styles')

		<!-- INTERNAl Tag css -->
		<link href="{{asset('assets/plugins/taginput/bootstrap-tagsinput.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

		@endsection

							@section('content')


							<!--Page header-->
							<div class="page-header d-xl-flex d-block">
								<div class="page-leftheader">
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2">Employee</span></h4>
								</div>
							</div>
							<!--End Page header-->

							<!-- Employee Create -->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-header border-0">
										<h4 class="card-title">Create Employee</h4>
									</div>
									<form method="POST" action="{{route('admin.imp.store')}}" enctype="multipart/form-data">
										<div class="card-body" >
											@csrf

											
											<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">First Name <span class="text-red">*</span></label>
														<input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"  value="{{old('firstname')}}" >
														@error('firstname')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Last Name <span class="text-red">*</span></label>
														<input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  value="{{old('lastname')}}" >
														@error('lastname')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Gender  <span class="text-red">*</span></label>
														<select class="form-control select2-show-search  select2 form-control @error('gender') is-invalid @enderror" data-placeholder="Select gender" name="gender"  >
															<option label="Select Gender"></option>
															
															
																<option  value="Male"> Male</option>
																<option  value="Female"> Female</option>
															

														</select>
														@error('role')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Role <span class="text-red">*</span></label>
														<select class="form-control select2-show-search  select2 @error('role') is-invalid @enderror" data-placeholder="Select Role" name="role"  >
															<option label="Select Role"></option>
															@foreach($roles as $role)
															@if($role->name != 'superadmin')
															
																<option  value="{{$role->name}}" {{ old('role') == $role->name ? "selected" : "" }}> {{$role->name}}</option>
															@endif
															@endforeach

														</select>
														@error('role')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Employee ID <span class="text-red">*</span></label>
														<input type="text" class="form-control @error('empid') is-invalid @enderror" placeholder="EMPID-001" name="empid"  value="{{old('empid')}}">
														@error('empid')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Mobile Number </label>
														<input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{old('phone')}}" >
														@error('phone')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Email address <span class="text-red">*</span></label>
														<input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{old('email')}}" >
														@error('email')
														
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>	
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Password <small class="text-muted"><i>Please copy the Password</i></small></label>
														<div class="input-group mb-4">
															<div class="input-group">
																<a href="javascript:void(0)" class="input-group-text"  >
																	<i class="fe fe-eye" aria-hidden="true"></i>
																</a>
																<input class="form-control @error('password') is-invalid @enderror" type="text"  name="password" value="12345678"  >
																@error('password')

																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror

															</div>
														</div>
													</div>
												</div>
												
												
											</div>
										</div>
										<div class="col-md-12 card-footer">
											<div class="form-group float-end">
												<input type="submit" class="btn btn-secondary" value="Create Employee" onclick="this.disabled=true;this.form.submit();">
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- End Employee Create -->
							@endsection

		@section('scripts')

		<!--File BROWSER -->
		<script src="{{asset('assets/js/form-browser.js')}}"></script>

		<!-- INTERNAL Vertical-scroll js-->
		<script src="{{asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')}}"></script>
		<script src="{{asset('assets/js/select2.js')}}"></script>

		<!-- INTERNAL Index js-->
		<script src="{{asset('assets/js/support/support-sidemenu.js')}}"></script>

		<!-- INTERNAL TAG js-->
		<script src="{{asset('assets/plugins/taginput/bootstrap-tagsinput.js')}}"></script>

		@endsection
