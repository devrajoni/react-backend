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
					      <th class="text-center">Service</th>
					      <th class="text-center">Image</th>
					      <th class="text-end">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  		@foreach($similarProjects as $similarProject)
							    <tr>
							        <td class="text-start">{{$loop->iteration}}</td>
							        <td class="text-center">{{ $similarProject->similarService->name ?? null }}</td>
							        <td class="text-center"><img src="{{ asset($similarProject->image) }}" alt="image" height="100" width="200"></td>
                                	<td class="text-end">
                                    	<div class="d-flex justify-content-end align-items-center">
                                    		<a href="{{ route('similar-project.edit', $similarProject->id) }}" class="btn text-primary btn-sm"><i class="ph-light ph-pencil"></i></a>

                                        	<form method="POST" action="{{ route('similar-project.destroy', $similarProject->id) }}" onsubmit="return confirm('Are you sure?');">
                                            	@csrf
                                            	@method('DELETE')

                                            		<button type="submit" class="btn text-danger btn-sm"><i class="ph-light ph-trash"></i></button>
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
