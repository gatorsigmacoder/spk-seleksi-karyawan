<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekrutmen_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('kuota');
            $table->boolean('status')->default(false);
            $table->boolean('is_calculated')->default(false);
            $table->boolean('is_plotted')->default(false);
            $table->boolean('ready_to_announce')->default(false);
            $table->boolean('is_announced')->default(false);
            $table->float('l_max', 5, 3)->default('0');
            $table->float('c_index', 5, 3)->default('0');
            $table->float('c_ratio', 5, 3)->default('0');
            $table->text('informasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekrutmen_models');
    }
};
