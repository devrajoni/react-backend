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
					      <th class="text-center">Name</th>
					      <th class="text-center">Status</th>
					      <th class="text-end">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  		@foreach($workCategories as $workCategory)
							    <tr>
							        <td class="text-start">{{$loop->iteration}}</td>
							        <td class="text-center">{{ $workCategory->name }}</td>
							      	<td class="text-center">
                                        @if($workCategory->status == 'Active')
                                            <a href="{{ route('work-category-status', $workCategory->id) }}"><span class="badge badge-pill badge-primary">Active</span>
                                            </a>
                                        @else
                                            <a href="{{ route('work-category-status', $workCategory->id) }}"><span class="badge badge-pill badge-danger">Inactive</span>
                                            </a>
                                        @endif
                                	</td>
                                	<td class="text-end">
                                    	<div class="d-flex justify-content-end align-items-center">
                                    		<a href="{{ route('work-category.edit', $workCategory->id) }}" class="btn text-primary btn-sm"><i class="ph-light ph-pencil"></i></a>

                                        	<form method="POST" action="{{ route('work-category.destroy', $workCategory->id) }}" onsubmit="return confirm('Are you sure?');">
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
