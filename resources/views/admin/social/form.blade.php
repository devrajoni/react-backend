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
                    <form action="{{ isset($social) ? route('social.update', $social->id) : route('social.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($social) @method('PUT') @endisset
                        <div class="row pt-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Facebook')"
                                name="facebook"
                                id="facebook"
                                :value="$social->facebook ?? null"
                                
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Twitter')"
                                name="twitter"
                                id="twitter"
                                :value="$social->twitter ?? null"
                            />
                        </div>
                        <div class="row pb-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Instagram')"
                                name="instagram"
                                id="instagram"
                                :value="$social->instagram ?? null"
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Youtube')"
                                name="youtube"
                                id="youtube"
                                :value="$social->youtube ?? null"
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

