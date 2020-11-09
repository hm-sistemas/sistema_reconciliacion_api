<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSplitsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('splits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('income_id');
            $table->integer('Z');

            $table->decimal('total', 13, 4)->default(0);
            $table->decimal('total_corresponsal', 13, 4)->default(0);
            $table->decimal('total_pesos_cash', 13, 4)->default(0);
            $table->decimal('total_pesos_credit', 13, 4)->default(0);
            $table->decimal('total_pesos_debit', 13, 4)->default(0);
            $table->decimal('total_pesos_card', 13, 4)->default(0);

            $table->foreign('income_id')->references('id')->on('incomes')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('splits');
    }
}