@extends("layouts.adminmaster")



@section('styles')

        <!-- INTERNAL owl-carousel css-->
        <link href="{{asset('assets/plugins/owl-carousel/owl-carousel.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
        <!-- INTERNAl Summernote css -->
        <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote.css')}}?v=<?php echo time(); ?>">
@endsection

@section('content')
    <div class="row my-6 py-6">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{ isset($setting) ? route('setting.update', $setting->id) : route('setting.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($setting) @method('PUT') @endisset
                        <div class="row pt-6">
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Website Name')"
                                name="company_name"
                                id="company_name"
                                :value="$setting->company_name ?? null"
                            />
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Email')"
                                name="email"
                                id="email"
                                :value="$setting->email ?? null"
                            />
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Phone')"
                                name="phone"
                                id="phone"
                                :value="$setting->phone ?? null"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Logo')"
                                type="file"
                                name="company_logo"
                                id="company_logo"
                                :value="isset($setting->company_logo) ? asset($setting->company_logo) :null"
                                accept="image/*"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Favicon')"
                                type="file"
                                name="favicon"
                                id="favicon"
                                :value="isset($setting->favicon) ? asset($setting->favicon) :null"
                                accept="image/*"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Address')"
                                name="address"
                                id="address"
                                :value="$setting->address ?? null"
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Map')"
                                name="map"
                                id="map"
                                :value="$setting->map ?? null"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Description')"
                                type="textarea"
                                name="description"
                                id="description"
                                :value="$setting->description ?? null"
                                class="summernote"
                                rows="3"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Long Description')"
                                type="textarea"
                                name="landing_description"
                                id="landing_description"
                                :value="$setting->landing_description ?? null"
                                class="summernote"
                                rows="3"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Copyright Name')"
                                name="copyright_name"
                                id="copyright_name"
                                :value="$setting->copyright_name ?? null"
                            />
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Copyright Year')"
                                name="copyright_year"
                                id="copyright_year"
                                :value="$setting->copyright_year ?? null"
                            />
                            <x-ui.input
                                group="col-md-4"
                                :label="__('Copyright Link')"
                                name="copyright_link"
                                id="copyright_link"
                                :value="$setting->copyright_link ?? null"
                            />
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
@endsection