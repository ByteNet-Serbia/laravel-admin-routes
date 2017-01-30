<?php

namespace ByteNet\LaravelAdminRoutes\app;

use Illuminate\Database\Eloquent\Model;

class RouteTerminal extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'routes_terminals';

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = false;
    
}
