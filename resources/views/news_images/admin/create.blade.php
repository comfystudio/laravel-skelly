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
                            <li class="breadcrumb-item active" aria-current="page">@if(isset($images)) Edit @else Add @endif</li>
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
                    <h3 class="block-title">@if(isset($meta['subSection'])) {{$meta['subSection']}} @endif @if(isset($images)) Edit @else Add @endif</h3>
                </div>
                <div class="block-content">
                    <form action="/admin/news-images/{{$news->id}}/{{isset($images) ? 'edit/'.$images->id : 'create'}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- Basic Elements -->
                        {{--<h2 class="content-heading pt-0">Basic</h2>--}}
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <!-- Form Horizontal - Default Style -->
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="title">Title</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="title" name="title" class="form-control @if($errors->has('title')) is-invalid @endif" value="@if(old('title')){{old('title')}} @elseif(isset($images->title)){{$images->title}}@endif">
                                        </div>
                                    </div>
                                </div>

                                @if (isset($images->id) && $images->image)
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="current">Current Image</label>
                                            <div class="col-sm-2">
                                                <td><img src="/{{$images->image}}" alt="{{$images->title}}" style = "width:120px;"></td>
                                            </div>

                                            <div class="col-sm-4">
                                                <a href="/admin/news-images/{{$news->id}}/download/{{$images->id}}/" class="btn btn-primary">Download Current News Image <i class="fa fa-cloud-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                 <!-- Image Cropper -->
                                <div class="row">
                                    <div class="col-lg-12 col-xl-6">
                                        <input type="file" name="image" id="image" onchange="readURL(this);"/>
                                        <div class="image_container mb-2">
                                            <img id="image1" src="#" alt="your image" style="display: none;"/>
                                        </div>

                                        <p id="crop_button" class="btn btn-primary">Crop</p>
                                        <span class = "help-block">Note: You must crop an image before you can save.</span>

                                    </div>

                                    <div class="col-lg-12 col-xl-6">
                                        <div class="mb-2" id="cropped_result"></div>
                                        <input type="hidden" name="cropped-image" id="cropped-image"/>
                                    </div>
                                </div>
                                <!-- END Image Cropper -->


                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="is_active">Is Active</label>
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="col-sm-8">
                                        <div class="custom-control custom-switch custom-control-lg mb-2">
                                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" @if((old('is_active') && old('is_active') != 0)  || (isset($images->is_active) && $images->is_active != 0) || (!isset($images->id))) checked = "checked" @endif>
                                            <label class="custom-control-label" for="is_active">No / Yes</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-8 ml-auto">
                                        <input id="save" type="submit" name="save" class="btn btn-info" value="@if(isset($images)) Update @else Save @endif" @if(!isset($images)) disabled @endif>
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
    <script type="text/javascript" defer>
        function readURL(input) {

            if (input.files && input.files[0]) {
                jQuery("#image1").show();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image1').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
                setTimeout(initCropper, 1000);
            }
        }
        function initCropper(){
            var image = document.getElementById('image1');
            var cropper = new Cropper(image, {
//              aspectRatio: 1 / 1,
              crop: function(e) {
              }
            });

            // On crop button clicked
            document.getElementById('crop_button').addEventListener('click', function(){
                jQuery('#save').attr('disabled',false);
                var imgurl =  cropper.getCroppedCanvas().toDataURL();
                var img = document.createElement("img");
                img.src = imgurl;
                jQuery("#cropped_result").html(img);
                jQuery("#cropped_result img").css('width', '100%');

                jQuery("#cropped-image").val(imgurl);
            })
        }

    </script>
@stop