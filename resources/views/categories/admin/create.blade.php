@extends('layouts.admin')

@section('content')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">@if(isset($meta['subSection'])) {{$meta['subSection']}} @endif</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/categories/">@if(isset($meta['subSection'])) {{$meta['subSection']}} @endif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(isset($categories)) Edit @else Add @endif</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            @include('partials.admin.error')
            @include('partials.admin.success')
            <!-- Elements -->
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">@if(isset($meta['subSection'])) {{$meta['subSection']}} @endif @if(isset($categories)) Edit @else Add @endif</h3>
                </div>
                <div class="block-content">
                    <form action="/admin/categories/{{isset($categories) ? 'edit/'.$categories->id : 'create'}}" method="POST">
                        {{ csrf_field() }}

                        <!-- Basic Elements -->
                        {{--<h2 class="content-heading pt-0">Basic</h2>--}}
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <!-- Form Horizontal - Default Style -->
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="name">Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="name" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="@if(old('name')){{old('name')}} @elseif(isset($categories->name)){{$categories->name}}@endif">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="is_active">Is Active</label>
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="col-sm-8">
                                        <div class="custom-control custom-switch custom-control-lg mb-2">
                                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" @if((old('is_active') && old('is_active') != 0)  || (isset($categories->is_active) && $categories->is_active != 0) || (!isset($categories->id))) checked = "checked" @endif>
                                            <label class="custom-control-label" for="is_active">No / Yes</label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-8 ml-auto">
                                        <input type="submit" name="save" class="btn btn-info" value="@if(isset($categories)) Update @else Save @endif">
                                        <a href = "{{ URL::previous() }}" type="submit" name="cancel" class="btn btn-effect-ripple btn-danger loader">Cancel</a>
                                    </div>
                                </div>
                                <!-- END Form Horizontal - Default Style -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Elements -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@stop