<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('income_id');

            $table->decimal('amount', 13, 4)->default(0);
            $table->tinyInteger('type')->default(2);
            $table->string('description');
            $table->dateTime('process_date_time');
            $table->foreign('income_id')->references('id')->on('incomes')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}