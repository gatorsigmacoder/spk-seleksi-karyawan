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
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('criteria_name');
            $table->boolean('store_berkas')->default(false);
            $table->boolean('store_nilai')->default(false);
            $table->boolean('store_text')->default(false);
            $table->boolean('is_calculated')->default(false);
            $table->float('l_max', 5, 3)->default('0');
            $table->float('c_index', 5, 3)->default('0');
            $table->float('c_ratio', 5, 3)->default('0');
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
        Schema::dropIfExists('kriterias');
    }
};
