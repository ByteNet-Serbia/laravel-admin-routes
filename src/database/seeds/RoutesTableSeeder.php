<?php

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cannot truncate a table referenced in a foreign key constraint, so...
        DB::table('routes_terminals')->delete();
        DB::table('routes')->delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \ByteNet\LaravelAdminRoutes\app\RouteTerminal::truncate();
        \ByteNet\LaravelAdminRoutes\app\Route::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $route = new ByteNet\LaravelAdminRoutes\app\Route();
        $route->name = 'Beograd - Užice express';
        $route->alias = str_slug($route->name);
        $route->active = '1';
        $route->description = "Dnevni polasci na express liniji BG-UE";
        $route->save();

        $route = new ByteNet\LaravelAdminRoutes\app\Route();
        $route->name = 'Beograd - Užice';
        $route->alias = str_slug($route->name);
        $route->active = '1';
        $route->description = "Dnevni polasci na međugradskoj liniji BG-UE";
        $route->save();

        $route = new ByteNet\LaravelAdminRoutes\app\Route();
        $route->name = 'Beograd - Požega';
        $route->alias = str_slug($route->name);
        $route->active = '0';
        $route->description = "Dnevni polasci na međugradskoj liniji BG-PO";
        $route->save();

        $route = new ByteNet\LaravelAdminRoutes\app\Route();
        $route->name = 'Beograd - Novi Sad';
        $route->alias = str_slug($route->name);
        $route->active = '1';
        $route->description = "Dnevni polasci na međugradskoj liniji BG-NS";
        $route->save();

        //factory(\ByteNet\LaravelAdminRoutes\app\Route::class, 4)->create();


        $routeTerminal = new ByteNet\LaravelAdminRoutes\app\RouteTerminal();
        $routeTerminal->route_id = 1;
        $routeTerminal->terminal_id = 1;
        $routeTerminal->active = '1';
        $routeTerminal->order = '0';
        $routeTerminal->arrive = null;
        $routeTerminal->departure = "0";
        $routeTerminal->note = "polazak";
        $routeTerminal->save();

        $routeTerminal = new ByteNet\LaravelAdminRoutes\app\RouteTerminal();
        $routeTerminal->route_id = 1;
        $routeTerminal->terminal_id = 2;
        $routeTerminal->active = '1';
        $routeTerminal->order = '1';
        $routeTerminal->arrive = "10800";
        $routeTerminal->departure = null;
        $routeTerminal->note = "dolazak";
        $routeTerminal->save();


        $routeTerminal = new ByteNet\LaravelAdminRoutes\app\RouteTerminal();
        $routeTerminal->route_id = 2;
        $routeTerminal->terminal_id = 1;
        $routeTerminal->active = '1';
        $routeTerminal->order = '0';
        $routeTerminal->arrive = null;
        $routeTerminal->departure = "0";
        $routeTerminal->note = "polazak";
        $routeTerminal->save();

        $routeTerminal = new ByteNet\LaravelAdminRoutes\app\RouteTerminal();
        $routeTerminal->route_id = 2;
        $routeTerminal->terminal_id = 5;
        $routeTerminal->active = '1';
        $routeTerminal->order = '1';
        $routeTerminal->arrive = "10000";
        $routeTerminal->departure = "0";
        $routeTerminal->note = "polazak";
        $routeTerminal->save();

        $routeTerminal = new ByteNet\LaravelAdminRoutes\app\RouteTerminal();
        $routeTerminal->route_id = 2;
        $routeTerminal->terminal_id = 6;
        $routeTerminal->active = '1';
        $routeTerminal->order = '2';
        $routeTerminal->arrive = "1000";
        $routeTerminal->departure = "0";
        $routeTerminal->note = "polazak";
        $routeTerminal->save();

        $routeTerminal = new ByteNet\LaravelAdminRoutes\app\RouteTerminal();
        $routeTerminal->route_id = 2;
        $routeTerminal->terminal_id = 2;
        $routeTerminal->active = '1';
        $routeTerminal->order = '3';
        $routeTerminal->arrive = "1600";
        $routeTerminal->departure = null;
        $routeTerminal->note = "dolazak";
        $routeTerminal->save();


        $routeTerminal = new ByteNet\LaravelAdminRoutes\app\RouteTerminal();
        $routeTerminal->route_id = 4;
        $routeTerminal->terminal_id = 1;
        $routeTerminal->active = '1';
        $routeTerminal->order = '0';
        $routeTerminal->arrive = null;
        $routeTerminal->departure = "0";
        $routeTerminal->note = "polazak";
        $routeTerminal->save();

        $routeTerminal = new ByteNet\LaravelAdminRoutes\app\RouteTerminal();
        $routeTerminal->route_id = 4;
        $routeTerminal->terminal_id = 7;
        $routeTerminal->active = '1';
        $routeTerminal->order = '1';
        $routeTerminal->arrive = "5400";
        $routeTerminal->departure = null;
        $routeTerminal->note = "dolazak";
        $routeTerminal->save();

        //factory(\ByteNet\LaravelAdminRoutes\app\RouteTerminal::class, 4)->create();
    }
}
