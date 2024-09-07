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
        Schema::create('pemberkasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daftar_rekrutmen_id');
            $table->foreignId('kriteria_id');
            $table->string('file')->default('');
            $table->string('client_file_name')->default('');
            $table->text('description')->nullable();
            $table->float('nilai', 5, 3)->default('0');
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
        Schema::dropIfExists('pemberkasans');
    }
};
