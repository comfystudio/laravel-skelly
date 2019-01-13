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
                            <li class="breadcrumb-item"><a href="/admin/news/">@if(isset($meta['section'])) {{$meta['section']}} @endif</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(isset($news)) Edit @else Add @endif</li>
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
                    <h3 class="block-title">@if(isset($meta['section'])) {{$meta['section']}} @endif @if(isset($news)) Edit @else Add @endif</h3>
                </div>
                <div class="block-content">
                    <form action="/admin/news/{{isset($news) ? 'edit/'.$news->id : 'create'}}"  method="POST">
                        {{ csrf_field() }}

                        <!-- Basic Elements -->
                        {{--<h2 class="content-heading pt-0">Basic</h2>--}}
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <!-- Form Horizontal - Default Style -->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="title">Title <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" id="title" name="title" class="form-control @if($errors->has('title')) is-invalid @endif" value="@if(old('title')){{old('title')}} @elseif(isset($news->title)){{$news->title}}@endif">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="text">
                                           Categories
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="js-select2 form-control" id="categories[]" name="categories[]" style="width: 100%;" data-placeholder="Choose Categories.." multiple>
                                                 @foreach($categories as $key => $category)
                                                    <option value="{{$key}}"
                                                        @if(old('categories') && (in_array($key, old('categories'))))
                                                            selected = "selected"
                                                        @elseif(isset($news['appends']['categories']) && in_array($key, $news['appends']['categories']))
                                                            selected = "selected"
                                                        @endif
                                                    >
                                                        {{$category}}
                                                    </option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="text">
                                           Tags
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="js-select2 form-control" id="tags[]" name="tags[]" style="width: 100%;" data-placeholder="Choose Tags.." multiple>
                                                 @foreach($tags as $key => $tag)
                                                    <option value="{{$key}}"
                                                        @if(old('tags') && (in_array($key, old('tags'))))
                                                            selected = "selected"
                                                        @elseif(isset($news['tags']) && in_array($key, $news['tags']))
                                                            selected = "selected"
                                                        @endif
                                                    >
                                                        {{$tag}}
                                                    </option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="text">Images</label>
                                    <div class="col-sm-4">
                                        <p class="btn btn-primary push" data-toggle="modal" data-target="#modal-block-fadein">Open</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="text">Text <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea id="text" name="text" class="form-control ckeditor @if($errors->has('text')) is-invalid @endif">@if(old('text')){{old('text')}} @elseif(isset($news->text)){{$news->text}}@endif</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="name">Publish Birth <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" id="publish_date" name="publish_date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" class="js-datepicker form-control @if($errors->has('publish_date')) is-invalid @endif" value="@if(old('publish_date')){{old('publish_date')}} @elseif(isset($news->publish_date)){{$news->publish_date}}@endif" autocomplete="false">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="title">Meta Title</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="meta_title" name="meta_title" class="form-control @if($errors->has('meta_title')) is-invalid @endif" value="@if(old('meta_title')){{old('meta_title')}} @elseif(isset($news->meta_title)){{$news->meta_title}}@endif">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="text">Meta Description </label>
                                    <div class="col-sm-10">
                                        <textarea id="text" name="meta_description" class="form-control ckeditor @if($errors->has('meta_description')) is-invalid @endif">@if(old('meta_description')){{old('meta_description')}} @elseif(isset($news->meta_description)){{$news->meta_description}}@endif</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="is_active">Is Active</label>
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-switch custom-control-lg mb-2">
                                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" @if((old('is_active') && old('is_active') != 0)  || (isset($tags->is_active) && $tags->is_active != 0) || (!isset($tags->id))) checked = "checked" @endif>
                                            <label class="custom-control-label" for="is_active">No / Yes</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10 ml-auto">
                                        <input type="submit" name="save" class="btn btn-info" value="@if(isset($news)) Update @else Save @endif">
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

            <!-- Fade In Block Modal -->
            <div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Images</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                @foreach($images as $image)
                                    <img src="/{{$image->image}}" alt="{{$image->title}}" style = "width:64px; height:64px"> {{$image->title}} LINK: <br/><strong><p>{{url('/')}}/{{$image->image}}</p></strong><br/>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="block-content block-content-full text-right bg-light">
                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Fade In Block Modal -->

        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@stop