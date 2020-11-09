<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('income_id');
            $table->foreign('income_id')->references('id')->on('incomes')->cascadeOnDelete();
            $table->decimal('amount', 13, 4)->default(0);
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('payment')->default(0);
            $table->integer('number');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}