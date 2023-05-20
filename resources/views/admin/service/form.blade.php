@extends("layouts.adminmaster")



@section('styles')

        <!-- INTERNAL owl-carousel css-->
        <link href="{{asset('assets/plugins/owl-carousel/owl-carousel.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote.css')}}?v=<?php echo time(); ?>">
@endsection

@section('content')
    <div class="row my-6 py-6">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{ isset($service) ? route('service.update', $service->id) : route('service.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($service) @method('PUT') @endisset
                        <div class="row pt-6">
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Name')"
                                name="name"
                                id="name"
                                :value="$service->name ?? null"
                            />
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Title')"
                                name="title"
                                id="title"
                                :value="$service->title ?? null"
                            />
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Sub Title')"
                                name="sub_title"
                                id="sub_title"
                                :value="$service->sub_title ?? null"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Icon')"
                                type="file"
                                name="icon"
                                id="icon"
                                :value="isset($service->icon) ? asset($service->icon) :null"
                                accept="image/*"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Image')"
                                type="file"
                                name="image"
                                id="image"
                                :value="isset($service->image) ? asset($service->image) :null"
                                accept="image/*"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Short Description')"
                                type="textarea"
                                name="short_description"
                                id="short_description"
                                :value="$service->short_description ?? null"
                                rows="3"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Long Description')"
                                type="textarea"
                                name="long_description"
                                id="long_description"
                                :value="$service->long_description ?? null"
                                rows="3"
                                class="summernote"
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
        <!-- INTERNAL Summernote js  -->
    <script src="{{asset('assets/plugins/summernote/summernote.js')}}?v=<?php echo time(); ?>"></script>

    <!-- INTERNAL Index js-->
    <script src="{{asset('assets/js/support/support-sidemenu.js')}}?v=<?php echo time(); ?>"></script>
    <script src="{{asset('assets/js/support/support-createticket.js')}}?v=<?php echo time(); ?>"></script>
    <script src="{{asset('assets/js/select2.js')}}?v=<?php echo time(); ?>"></script>

    <!-- INTERNAL Dropzone js-->
    <script src="{{asset('assets/plugins/dropzone/dropzone.js')}}?v=<?php echo time(); ?>"></script>

    <script type="text/javascript">
        // summernote 
        $('.note-editable').on('keyup', function(e){
            localStorage.setItem('adminmessage', e.target.innerHTML)
        })
        

        // onload get the data from local
        $(window).on('load', function(){
            if(localStorage.getItem('adminsubject') || localStorage.getItem('adminmessage') || localStorage.getItem('adminemail')){

                document.querySelector('#subject').value = localStorage.getItem('adminsubject');
                document.querySelector('#email').value = localStorage.getItem('adminemail');
                document.querySelector('.summernote').innerHTML = localStorage.getItem('adminmessage');
                document.querySelector('.note-editable').innerHTML = localStorage.getItem('adminmessage');
            }
        }) 
    </script>
    <script>
        $(document).ready(function(){
            $('#status').val("{{$service->status ?? ''}}");
        });
    </script>
@endsection
