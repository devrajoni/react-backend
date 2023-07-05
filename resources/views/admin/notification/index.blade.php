@extends("layouts.adminmaster")



@section('styles')

        <!-- INTERNAL owl-carousel css-->
        <link href="{{asset('assets/plugins/owl-carousel/owl-carousel.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
@endsection

@section('content')
    <div class="row my-6 py-6">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
					<table class="table table-striped py-6 my-6">
					    <thead>
						    <tr>
						      <th class="text-start">#</th>
						      <th class="text-center">First Name</th>
						      <th class="text-center">Last Name</th>
						      <th class="text-center">Email</th>
						      <th class="text-center">Subject</th>
						      <th class="text-center">Message</th>
						      <th class="text-center">Time</th>
						      <th class="text-end">Action</th>
						    </tr>
						</thead>
					  	<tbody>
					  		@foreach($contacts as $contact)
							    <tr>
							    	<td class="text-start">{{$loop->iteration}}</td>
							      	<td class="text-center">{{ $contact->first_name }}</td>
							      	<td class="text-center">{{ $contact->last_name }}</td>
							      	<td class="text-center">{{ $contact->email }}</td>
							      	<td class="text-center">{{ $contact->subject }}</td>
							      	<td class="text-center">{{ $contact->message }}</td>
							      	<td class="text-center">{{ $contact->created_at }}</td>
							      	<td class="text-end">
							      		<a href="{{ route('contact-destroy', $contact->id) }}"><button type="submit" class="btn text-danger btn-sm"><i class="ph-light ph-trash"></i></i></button></a>
							      	</td>
							    </tr>
					  		@endforeach
					  	</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
@endsection
