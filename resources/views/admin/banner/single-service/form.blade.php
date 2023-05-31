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
                    <form action="{{ isset($singleServiceBanner) ? route('single-service-banner.update', $singleServiceBanner->id) : route('single-service-banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($singleServiceBanner) @method('PUT') @endisset

<!--                         <div class="row pt-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Title')"
                                name="title"
                                id="title"
                                :value="$singleServiceBanner->title ?? null"
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Sub Title')"
                                name="sub_title"
                                id="sub_title"
                                :value="$singleServiceBanner->sub_title ?? null"
                            />
                        </div> -->
<!--                         <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Description')"
                                type="textarea"
                                name="description"
                                id="description"
                                :value="$singleServiceBanner->description ?? null"
                                class="summernote"
                                rows="3"
                            />
                        </div> -->
                        <div class="row py-6">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Image')"
                                type="file"
                                name="image"
                                id="image"
                                :value="isset($singleServiceBanner->image) ? asset($singleServiceBanner->image) :null"
                                accept="image/*"
                            />
                            <p>W:2500 H:1754</p>
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