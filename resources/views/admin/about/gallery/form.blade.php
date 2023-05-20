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
                    <form action="{{ isset($aboutGallery) ? route('about-gallery.update', $aboutGallery->id) : route('about-gallery.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($aboutGallery) @method('PUT') @endisset
                        <div class="row pt-6">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Image One')"
                                type="file"
                                name="image_one"
                                id="image_one"
                                :value="isset($aboutGallery->image_one) ? asset($aboutGallery->image_one) :null"
                                accept="image/*"
                            />
                        </div>
                        <div class="row pb-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Image Two')"
                                type="file"
                                name="image_two"
                                id="image_two"
                                :value="isset($aboutGallery->image_two) ? asset($aboutGallery->image_two) :null"
                                accept="image/*"
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Image Three')"
                                type="file"
                                name="image_three"
                                id="image_three"
                                :value="isset($aboutGallery->image_three) ? asset($aboutGallery->image_three) :null"
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