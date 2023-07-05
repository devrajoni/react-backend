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
                    <form action="{{ isset($serviceBanner) ? route('service-banner.update', $serviceBanner->id) : route('service-banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($serviceBanner) @method('PUT') @endisset

                        <div class="row py-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Title')"
                                name="title"
                                id="title"
                                :value="$serviceBanner->title ?? null"
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Image')"
                                type="file"
                                name="image"
                                id="image"
                                :value="isset($serviceBanner->image) ? asset($serviceBanner->image) :null"
                                accept="image/*"
                            />
                            <p>W:2000 H:600</p>
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