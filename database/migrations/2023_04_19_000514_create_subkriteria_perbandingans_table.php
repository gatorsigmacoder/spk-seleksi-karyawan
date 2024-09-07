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
        Schema::create('subkriteria_perbandingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_id');
            $table->foreignId('subkriteria_id_1');
            $table->foreignId('subkriteria_id_2');
            $table->float('value', 5, 3)->default('0');
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
        Schema::dropIfExists('subkriteria_perbandingans');
    }
};
