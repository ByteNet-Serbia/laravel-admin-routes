<?php

namespace ByteNet\LaravelAdminRoutes\app\Http\Controllers;

use App\Http\Controllers\Controller;
use ByteNet\LaravelAdminRoutes\app\Route;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        //$this->middleware('bytenet.auth');
    }

    public function index()
    {
        $title = ucfirst(trans('bytenet.routes::routes.routes')); // set the page title

        //$contacts = DB::table('routes')->get();
        $routes = Route::all('id', 'name', 'alias', 'active', 'description');
        //$routes = Route::with('terminals')->get();
        //$routes = Route::with(['terminals' => function ($query) {
        //    $query->where('name', 'like', '%bas%');
        //}])->get();

        return view('bytenet.routes::routes.index', compact('routes', 'title'));
    }

    public function show(Route $route)
    {
        $title = ucfirst(trans('bytenet.routes::routes.route')); // set the page title
        return view('bytenet.routes::route.show', compact('route', 'title'));
    }
}
