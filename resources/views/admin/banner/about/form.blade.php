@extends("layouts.adminmaster")

@section('styles')

        <!-- INTERNAL owl-carousel css-->
        <link href="{{asset('assets/plugins/owl-carousel/owl-carousel.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
        <!-- INTERNAl Dropzone css -->
        <link href="{{asset('assets/plugins/dropzone/dropzone.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{asset('assets')}}/plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
@endsection

@section('content')
    <div class="row my-6 py-6">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{ isset($aboutBanner) ? route('about-banner.update', $aboutBanner->id) : route('about-banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($aboutBanner) @method('PUT') @endisset

                        <div class="row py-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Title')"
                                name="title"
                                id="title"
                                :value="$aboutBanner->title ?? null"
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Image')"
                                type="file"
                                name="image"
                                id="image"
                                :value="isset($aboutBanner->image) ? asset($aboutBanner->image) :null"
                                accept="image/*"
                            />
                            <p>W:2000 H:1331</p>
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
    <!-- INTERNAL Vertical-scroll js-->
    <script src="{{asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')}}?v=<?php echo time(); ?>"></script>

    <!-- INTERNAL Summernote js  -->
    <script src="{{asset('assets/plugins/summernote/summernote.js')}}?v=<?php echo time(); ?>"></script>

    <!-- INTERNAL Index js-->
    <script src="{{asset('assets/js/support/support-sidemenu.js')}}?v=<?php echo time(); ?>"></script>
    <script src="{{asset('assets/js/support/support-createticket.js')}}?v=<?php echo time(); ?>"></script>
    <script src="{{asset('assets/js/select2.js')}}?v=<?php echo time(); ?>"></script>

    <!-- INTERNAL Dropzone js-->
    <script src="{{asset('assets/plugins/dropzone/dropzone.js')}}?v=<?php echo time(); ?>"></script>
@endsection

