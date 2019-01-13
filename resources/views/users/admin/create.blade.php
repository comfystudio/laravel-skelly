@extends('layouts.admin')

@section('content')
    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">@if(isset($meta['section'])) {{$meta['section']}} @endif</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/users/">@if(isset($meta['section'])) {{$meta['section']}} @endif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(isset($user)) Edit @else Add @endif</li>
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
                    <h3 class="block-title">@if(isset($meta['section'])) {{$meta['section']}} @endif @if(isset($user)) Edit @else Add @endif</h3>
                </div>
                <div class="block-content">
                    <form action="/admin/users/{{isset($user) ? 'edit/'.$user->id : 'create'}}" method="POST">
                        {{ csrf_field() }}

                        <!-- Basic Elements -->
                        {{--<h2 class="content-heading pt-0">Basic</h2>--}}
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <!-- Form Horizontal - Default Style -->
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="name">Username <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" id="name" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="@if(old('name')){{old('name')}} @elseif(isset($user->name)){{$user->name}}@endif">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" id="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="@if(old('email')){{old('email')}} @elseif(isset($user->email)){{$user->email}}@endif">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="password" id="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif">
                                        <span class = "help-block">Note: Password must contain at least one number, one uppercase letter and atleast 8 characters.</span>
                                    </div>

                                    <div class="col-md-2 mt-2">
                                        <div class="checkbox">
                                            <label for="generate_password">
                                               <input type="checkbox" id="generate_password" name="generate_password" value="1" /> Generate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div id="generated_password"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="password">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control @if($errors->has('confirm_password')) is-invalid @endif">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-8 ml-auto">
                                        <input type="submit" name="save" class="btn btn-info" value="@if(isset($user)) Update @else Save @endif">
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