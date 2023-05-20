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
                    <form action="{{ isset($aboutSkill) ? route('about-skill.update', $aboutSkill->id) : route('about-skill.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($aboutSkill) @method('PUT') @endisset
                        <div class="row pt-6">
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Name')"
                                name="name"
                                id="name"
                                :value="$aboutSkill->name ?? null"
                            />
                            <x-ui.input
                                group="col-md-6"
                                :label="__('Percentage')"
                                name="percentage"
                                id="percentage"
                                :value="$aboutSkill->percentage ?? null"
                            />
                        </div>
                        <div class="row pb-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">{{ __('Status') }}</label>
                                    <select class="form-control" name="status" id="status" value="{{ old('status') }}">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
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
    <script>
        $(document).ready(function(){
            $('#status').val("{{$aboutSkill->status ?? ''}}");
        });
    </script>
@endsection
