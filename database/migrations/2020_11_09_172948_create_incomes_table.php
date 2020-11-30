<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->integer('year');
            $table->integer('month');
            $table->decimal('exchange_rate', 13, 4)->default(0);
            $table->decimal('total', 13, 4)->default(0);
            $table->decimal('total_corresponsal', 13, 4)->default(0);
            $table->decimal('total_pesos_cash', 13, 4)->default(0);
            $table->decimal('total_pesos_credit', 13, 4)->default(0);
            $table->decimal('total_pesos_debit', 13, 4)->default(0);
            $table->decimal('total_pesos_card', 13, 4)->default(0);
            $table->decimal('total_pesos', 13, 4)->default(0);
            $table->decimal('total_pesos_USD', 13, 4)->default(0);
            $table->decimal('total_voucher', 13, 4)->default(0);
            $table->text('comments')->nullable();

            $table->unsignedBigInteger('deposit_id')->default(0);
            $table->foreign('deposit_id')->references('id')->on('deposits')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}