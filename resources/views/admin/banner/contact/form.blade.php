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
                    <form action="{{ isset($contactBanner) ? route('contact-banner.update', $contactBanner->id) : route('contact-banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($contactBanner) @method('PUT') @endisset

                        <div class="row py-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Title')"
                                name="title"
                                id="title"
                                :value="$contactBanner->title ?? null"
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Image')"
                                type="file"
                                name="image"
                                id="image"
                                :value="isset($contactBanner->image) ? asset($contactBanner->image) :null"
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