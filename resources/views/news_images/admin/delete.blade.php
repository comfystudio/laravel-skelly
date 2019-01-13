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
                            <li class="breadcrumb-item"><a href="/admin/news-images/{{$news->id}}/">@if(isset($meta['subSection'])) {{$meta['subSection']}} @endif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Delete</li>
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
                    <h3 class="block-title">@if(isset($meta['subSection'])) {{$meta['subSection']}} @endif</h3>
                </div>
                <div class="block-content">

                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 my-2">Warning</h3>
                            <li class="mb-2">Please note that this will remove this News Image. You can add them again at a later time.</li>
                    </div>

                    <form action="/admin/news-images/{{$news->id}}/delete/{{$images->id}}" method="POST">
                        {{ csrf_field() }}

                        <!-- Basic Elements -->
                        {{--<h2 class="content-heading pt-0">Basic</h2>--}}
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <!-- Form Horizontal - Default Style -->
                                <div class="form-group row">
                                    <label class="col-sm-8 col-form-label" for="username">You are removing: <strong>{{$images['title']}}</strong></label>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-8 ml-auto">
                                        <input type="submit" name="delete" class="btn btn-info" value="Delete">
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