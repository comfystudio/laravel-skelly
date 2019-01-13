@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 full-height-vh padding-top-100">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="tt-heading">
                        <div class="tt-heading-inner">
                            <h1 class="tt-heading-title">Login</h1>
                            <!-- <div class="tt-heading-subtitle">Subtitle Here</div> -->
                            <hr class="hr-short">
                        </div> <!-- /.tt-heading-inner -->
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/queries/unsub') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="save" class="btn btn-primary" value="Unsubscribe">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection