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
                    <form action="{{ isset($work) ? route('work.update', $work->id) : route('work.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($work) @method('PUT') @endisset
                        <div class="row pt-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">{{ __('Category') }}</label>
                                    <select class="form-control" name="category_id" id="category_id" value="{{ old('category_id') }}">
                                        @foreach($workCategories as $workCategory)
                                            <option value="{{ $workCategory->id }}">{{ $workCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Title')"
                                name="title"
                                id="title"
                                :value="$work->title ?? null"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Image')"
                                type="file"
                                name="image"
                                id="image"
                                :value="isset($work->image) ? asset($work->image) :null"
                                accept="image/*"
                            />
                        </div>
                        <div class="row pb-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">{{ __('Status') }}</label>
                                    <select class="form-control" name="status" id="status" value="{{ old('status') }}">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pt-3">
                                <button class="btn btn-secondary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#status').val("{{$work->status ?? ''}}");
            $('#category_id').val("{{$work->category_id ?? ''}}");
        });
    </script>
@endsection

