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
						      <th class="text-center">Blog ID</th>
						      <th class="text-center">Name</th>
						      <th class="text-center">Designation</th>
						      <th class="text-center">Image</th>
						      <th class="text-center">Rating</th>
						      <th class="text-center">Description</th>
						      <th class="text-center">Status</th>
						      <th class="text-end">Action</th>
						    </tr>
						</thead>
					  	<tbody>
					  		@foreach($testimonials as $testimonial)
							    <tr>
							      	<td class="text-start">{{$loop->iteration}}</td>
							      	<td class="text-center">{{ $testimonial->latest->title }}</td>
							      	<td class="text-center">{{ $testimonial->name }}	</td>
							      	<td class="text-center">{{ $testimonial->designation }}</td>
							      	<td class="text-center"><img src="{{ asset($testimonial->image) }}" alt="image" height="100" width="200"></td>
							      	<td class="text-center">{{ $testimonial->rating }}</td>
							      	<td class="text-center">{!! $testimonial->description !!}</td>
                                  	<td class="text-center">
                                        @if($testimonial->status == 'Active')
                                            <a href="{{ route('testimonial-status', $testimonial->id) }}"><span class="badge badge-pill badge-primary">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('testimonial-status', $testimonial->id) }}"><span class="badge badge-pill badge-danger">Inactive</span>
                                            </a>
                                        @endif
                                	</td>
							      	<td class="text-end">
                                    <div class="text-center">
                                       <!--  <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-sm text-primary"><i class="ph-light ph-pencil"></i></a> -->

                                        <form method="POST" action="{{ route('testimonial.destroy', $testimonial->id) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm text-danger"><i class="ph-light ph-trash"></i></button>
                                        </form>
                                    </div>
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
