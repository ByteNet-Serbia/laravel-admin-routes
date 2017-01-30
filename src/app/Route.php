<?php

namespace ByteNet\LaravelAdminRoutes\app;

use ByteNet\LaravelAdminDriveSchedule\app\DriveSchedule;
use ByteNet\LaravelAdminTerminals\app\Terminal;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /**
     * The terminals that belong to the route.
     */
    public function terminals()
    {
        return $this->belongsToMany(Terminal::class, 'routes_terminals')
            ->withPivot('active', 'order', 'arrive', 'departure', 'note');
    }

    /**
     * Get the drive schedules for the route.
     */
    public function driveSchedules()
    {
        return $this->hasMany(DriveSchedule::class);
    }
}
