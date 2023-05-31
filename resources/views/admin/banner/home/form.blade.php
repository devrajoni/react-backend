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
                    <form action="{{ isset($homeBanner) ? route('home-banner.update', $homeBanner->id) : route('home-banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($homeBanner) @method('PUT') @endisset
                        <div class="row pt-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Title')"
                                name="title"
                                id="title"
                                :value="$homeBanner->title ?? null"
                            />

                            <x-ui.input
                                group="col-md-6"
                                :label="__('Sub Title')"
                                name="sub_title"
                                id="sub_title"
                                :value="$homeBanner->sub_title ?? null"
                            />
                        </div>
                        <div class="row pb-6 pt-2">
                            <x-ui.input
                                group="col-md-12"
                                :label="__('Image')"
                                type="file"
                                name="image"
                                id="image"
                                :value="isset($homeBanner->image) ? asset($homeBanner->image) :null"
                                accept="image/*"
                            />
                            <p>W:2379 H:1213</p>
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
