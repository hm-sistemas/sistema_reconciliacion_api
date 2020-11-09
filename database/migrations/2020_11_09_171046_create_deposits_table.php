<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('date_from');
            $table->date('date_to');
            $table->text('comments')->nullable();
            $table->decimal('total_pesos', 13, 4)->default(0);
            $table->decimal('total', 13, 4)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}