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
        Schema::create('daftar_rekrutmens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rekrutmen_model_id');
            $table->foreignId('user_id');
            $table->float('vektor_v', 5, 3)->default('0');
            $table->float('vektor_s', 5, 3)->default('0');
            $table->boolean('is_accepted')->default(false);
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
        Schema::dropIfExists('daftar_rekrutmens');
    }
};
