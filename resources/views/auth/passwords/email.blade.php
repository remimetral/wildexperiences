@extends('layouts.switcher')

@section('description'){{ strip_tags(ucfirst(Lang::get('meta.description'))) }}@stop

@section('title'){{ strip_tags(ucfirst(Lang::get('meta.title.reset'))) }}@stop

@section('content')

    <input class="page_title" type="hidden" value="{{ strip_tags(ucfirst(Lang::get('meta.title.reset'))) }}">
    <input class="page_id" type="hidden" value="{{ $page_id }}">
    <input class="page_menu_id" type="hidden" value="{{ $page_id }}">

    <div class="container_page {{ $page_id }}">
        <div class="bg_page"></div>
        <div class="content_scroll">
            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="columns col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">Reset Password</div>

                                <div class="panel-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Send Password Reset Link
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
