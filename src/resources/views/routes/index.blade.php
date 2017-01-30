@extends('bytenet::layout')

@section('header')
    <h1>
        <i class="fa fa-arrow-circle-right"></i>
        {{ ucfirst(trans('bytenet.admin-routes::admin-routes.routes')) }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}">{{ config('bytenet.base.project_name') }}</a></li>
        <li>{{ ucfirst(trans('bytenet.admin-routes::admin-routes.routes')) }}</li>
    </ol>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">{{ config('bytenet.admin-routes.routes') }}
            <ul class="list-group">
                @if(! count($routes))
                    <li class="list-group-item"><em>empty</em></li>
                @else
                    @foreach($routes as $route)
                        <li class="list-group-item">
                            @unless($route->active)
                                <span class="label label-danger">{{ trans('bytenet.admin-terminals::admin-terminals.inactive') }}</span>
                            @endunless

                            <a title="{{ $route->alias }}" href="/admin/routes/{{ $route->id }}">{{ $route->name }}</a>
                            <div class="pull-right p-l-25">{{ $route->id }}.</div>
                            <div class="pull-right p-l-25">{{ $route->description }}</div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection
