@extends("layouts.adminmaster")

@section('styles')

        <!-- INTERNAL owl-carousel css-->
        <link href="{{asset('assets/plugins/owl-carousel/owl-carousel.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
        <!-- INTERNAl Dropzone css -->
        <link href="{{asset('assets/plugins/dropzone/dropzone.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{asset('assets')}}/plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
        <style>
            .image{
                position: relative;
            }

            .image img{
                height: 100px;
                width:310px !important;
                }

            .image .deleteRecord i{
                position: absolute;
                height: 10px;
                width: 10px;
                left: 40%;
                bottom: 50%;
                top: 40%;
                display: none;

            }

            .image:hover .deleteRecord i{
                display: block;

            }

             .image:hover img{
                color: black;
                opacity: 40%;

            }
        </style>
@endsection

@section('content')
    <div class="row my-6 py-6">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{ isset($serviceWork) ? route('service-work.update', $serviceWork->id) : route('service-work.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($serviceWork) @method('PUT') @endisset

                        <div class="row pt-6">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Image')"
                                type="file"
                                name="image[]"
                                id="image[]"
                                accept="image/*"
                                multiple
                            />
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex">
                                @foreach ($serviceWorks as $data)
                                    <div class="image">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">

                                        <img src="{{ asset($data->image) }}" alt="" id="gallery">
                                        <button type="button" data-id="{{ $data->id }}" data-url="{{ route('service-work.destroy', $data->id)}}" class="deleteRecord btn text-danger">
                                            <i class="ph-light ph-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pt-3">
                            <button class="btn btn-secondary">Submit</button>
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
    <script>
        $(document).ready(function(){
            $(".deleteRecord").click(function(){
                var id = $(this).data("id");
                var url = $(this).data("url");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax(
                {
                    url: url,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (res){
                        if(res.success){
                            window.location.reload();
                        }
                    }
                });
           
            });
        });
    </script>
@endsection
