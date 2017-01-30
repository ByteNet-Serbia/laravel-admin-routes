<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            //$table->uuid('uuid'); // $table->primary('id');

            $table->increments('id');
            $table->string('name', 150);
            $table->string('alias', 191);
            $table->boolean('active')->nullable()->comment('is active route?');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique('alias');

            $table->index('active');
        });

        Schema::create('routes_terminals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('route_id');
            $table->unsignedInteger('terminal_id');
            $table->boolean('active')->nullable()->comment('is active route?');
            $table->unsignedSmallInteger('order');
            $table->unsignedMediumInteger('arrive')->nullable()->comment('in seconds');
            $table->unsignedMediumInteger('departure')->nullable()->comment('in seconds');
            $table->string('note', 191)->nullable()->comment('short note');

            $table->unique(['route_id', 'terminal_id']);

            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('terminal_id')->references('id')->on('terminals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes_terminals');

        Schema::dropIfExists('routes');
    }
}
