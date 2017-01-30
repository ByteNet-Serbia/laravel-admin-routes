@extends('bytenet::layout')

@section('header')
    <h1>
        <i class="fa fa-arrow-circle-right"></i>
        {{ ucfirst(trans('bytenet.admin-routes::admin-routes.routes')) }} <small>{{ ucfirst(trans('bytenet.admin-routes::admin-routes.route')) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}">{{ config('bytenet.base.project_name') }}</a></li>
        <li><a href="{{ url('admin/routes') }}">{{ ucfirst(trans('bytenet.admin-routes::admin-routes.routes')) }}</a></li>
        <li class="active">{{ ucfirst(trans('bytenet.admin-routes::admin-routes.route')) }} "{{ $route->name }}"</li>
    </ol>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">

            <h2>
                @unless($route->active)
                    <span class="label label-danger">{{ trans('bytenet.admin-routes::admin-routes.inactive') }}</span>
                @endunless
                {{ $route->name }}
                <small>{{ $route->alias }}</small>
            </h2>

            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">Arrive: {{ $route->arrive }}</li>
                    <li class="list-group-item">Description: {{ $route->description }}</li>
                    <li class="list-group-item">Created: {{ $route->created_at }}</li>
                    <li class="list-group-item">Updated: {{ $route->updated_at }}</li>
                </ul>
            </div>

            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>Stanice i raspored</h3>


                        <ul class="list-group">
                            @if(count($route->terminals))

                                @foreach ($route->terminals as $terminal)
                                <li class="list-group-item">

                                    @unless($terminal->active)
                                        <span class="label label-danger">{{ trans('bytenet.admin-terminals::admin-terminals.inactive') }}</span>
                                    @endunless

                                    @if($terminal->offroad_station)
                                        <span class="label label-primary">{{ trans('bytenet.admin-terminals::admin-terminals.offroad_station') }}</span>
                                    @endif

                                    @if($terminal->roadside_stop)
                                        <span class="label label-default">{{ trans('bytenet.admin-terminals::admin-terminals.roadside_stop') }}</span>
                                    @endif

                                    @if(! $terminal->offroad_station && ! $terminal->roadside_stop)
                                        <span class="label label-warning">{{ trans('bytenet.admin-terminals::admin-terminals.terminal_type_unknown') }}</span>
                                    @endif

                                    <br>
                                    <a href="{{ url('/' . config('bytenet.base.route_prefix') . '/terminals') }}/{{ $terminal->id }}">
                                        {{ $terminal->name }}
                                    </a>




                                    <div class="pull-right p-l-25 col-md-6">
                                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD9_CRWjF4WJwqe8zWnNn-cAWC3MFBr6WQ&q={{ $terminal->lat }},{{ $terminal->long }}&zoom=15" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                    <div class="clearfix"></div>
                                    {{-- $terminal --}}
                                    <div class="pull-right p-l-25">{{ $terminal->id }}.</div>
                                </li>
                                @endforeach

                            @else
                                <li class="list-group-item">
                                    {{ trans('bytenet.admin-terminals::admin-terminals.no-terminals') }}
                                </li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>

            {{-- $route --}}

        </div>
    </div>
@endsection
