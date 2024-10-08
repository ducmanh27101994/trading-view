<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymbolsTable extends Migration
{
    public function up()
    {
        Schema::create('symbols', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('images');
            $table->string('base');
            $table->string('quote');
            $table->integer('fix_base');
            $table->integer('fix_quote');
            $table->decimal('open', 30, 18);
            $table->decimal('close', 30, 18);
            $table->decimal('high', 30, 18);
            $table->decimal('low', 30, 18);
            $table->decimal('chg', 8, 4);
            $table->decimal('lastPrice', 30, 18);
            $table->string('lastSide')->nullable();
            $table->decimal('v', 30, 18);
            $table->decimal('q', 30, 18);
            $table->decimal('fee', 18, 9);
            $table->decimal('minQuote', 30, 18);
            $table->integer('status');
            $table->integer('isStocks');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('symbols');
    }
}
