<?php

namespace ByteNet\LaravelAdminRoutes\app\Http\Controllers;

use App\Http\Controllers\Controller;
use ByteNet\LaravelAdminRoutes\app\RouteTerminal;
use Illuminate\Http\Request;

class RoutesTerminalsController extends Controller
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
        $title = ucfirst(trans('bytenet::routes.routes')); // set the page title

        //$contacts = DB::table('routes_terminals')->get();
        $routes = RouteTerminal::all('id', 'route_id', 'terminal_id', 'active');

        return view('bytenet.routes::routes.index', compact('routes', 'title'));
    }

    public function show(RouteTerminal $routeTerminal)
    {
        $title = ucfirst(trans('bytenet::routes.route')); // set the page title
        return view('bytenet.routes::route.show', compact('routeTerminal', 'title'));
    }
}
