
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
							
							<!-- Employee Update -->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-header border-0">
										<h4 class="card-title">Edit Employee</h4>
									</div>
									<form method="POST" action="{{url('/admin/agentprofile/' . $user->id)}}" enctype="multipart/form-data">
										<div class="card-body" >
											@csrf

										
											<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">First Name <span class="text-red">*</span></label>
														<input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname"  value="{{ $user->firstname }}" >
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
														<input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"  value="{{$user->lastname }}" >
														@error('lastname')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Username</label>
														<input type="text" class="form-control" name="name"  value="{{$user->name }}" disabled >
													</div>
												</div>
												
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Employee ID <span class="text-red">*</span></label>
														<input type="text" class="form-control @error('empid') is-invalid @enderror" placeholder="" name="empid"  value="{{$user->empid}}">
														@error('empid')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Role  <span class="text-red">*</span></label>
														@if($user->id == '1')
														
															@if(!empty($user->getRoleNames()[0]))

															<input type="text" class="form-control" name="role" value="{{$user->getRoleNames()[0]}}" readonly>
															
															@else
															
															<input type="text" class="form-control" name="role" value="superadmin" readonly>
															
															@endif

														</select>
														@else
														<select class="form-control select2-show-search  select2 @error('role') is-invalid @enderror" data-placeholder="Select Role" name="role"  >
															@if(!empty($user->getRoleNames()[0]))

															<option label="Select Role"></option>
															@foreach($roles as $role)
															@if($role->name != 'superadmin')

															<option  value="{{$role->name}}" {{ old('role', $user->getRoleNames()[0])==$role->name ? 'selected' :'' }}> {{$role->name}}</option>
															@endif
															@endforeach

															@else

															<option label="Select Role"></option>
															@foreach($roles as $role)
															@if($role->name != 'superadmin')
															
															<option  value="{{$role->name}}" {{ old('role')==$role->name ? 'selected' :'' }}> {{$role->name}}</option>
															@endif
															@endforeach
															@endif

														</select>
														@endif
														@error('role')
														
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Email <span class="text-red">*</span></label>
														<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" Value="{{$user->email}}">
														@error('email')
														
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror

													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Mobile Number</label>
														<input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{old('phone', $user->phone)}}" >
														@error('phone')

															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
												</div>
												
												
												
												
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<label class="form-label">Status</label>
														@if($user->id == 1)

														<select class="form-control  select2" data-placeholder="Select Status" name="status" disabled>
															<option label="Select Status"></option>
															<option value="1" @if ($user->status === '1') selected @endif>Active</option>
															<option value="0" @if ($user->status === '0') selected @endif>Inactive</option>
														</select>
														@else

														<select class="form-control  select2" data-placeholder="Select Status" name="status">
															<option label="Select Status"></option>
															<option value="1" @if ($user->status === '1') selected @endif>Active</option>
															<option value="0" @if ($user->status === '0') selected @endif>Inactive</option>
														</select>
														@endif
														
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<div class="form-group float-end">
												<input type="submit" class="btn btn-secondary" value="Update Profile" onclick="this.disabled=true;this.form.submit();">
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- End Employee Update -->


							@endsection

		@section('scripts')

		<!--File BROWSER -->
		<script src="{{asset('assets/js/form-browser.js')}}?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Vertical-scroll js-->
		<script src="{{asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')}}?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Index js-->
		<script src="{{asset('assets/js/support/support-sidemenu.js')}}?v=<?php echo time(); ?>"></script>
		<script src="{{asset('assets/js/select2.js')}}?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL TAG js-->
		<script src="{{asset('assets/plugins/taginput/bootstrap-tagsinput.js')}}?v=<?php echo time(); ?>"></script>

		@endsection
