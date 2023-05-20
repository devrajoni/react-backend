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
                    <form action="{{ isset($aboutBusiness) ? route('about-business.update', $aboutBusiness->id) : route('about-business.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($aboutBusiness) @method('PUT') @endisset
                        <div class="row pt-6">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Title')"
                                name="title"
                                id="title"
                                :value="$aboutBusiness->title ?? null"
                            />
                        </div>
                        <div class="row">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Description')"
                                type="textarea"
                                name="description"
                                id="description"
                                class="summernote"
                                :value="$aboutBusiness->description ?? null"
                            />
                        </div>
                        <div class="row pb-6 pt-2">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Image')"
                                type="file"
                                name="image"
                                id="image"
                                :value="isset($aboutBusiness->image) ? asset($aboutBusiness->image) :null"
                                accept="image/*"
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
    <script>
        $(document).ready(function(){
            $('#status').val("{{$aboutCard->status ?? ''}}");
        });
    </script>
@endsection
