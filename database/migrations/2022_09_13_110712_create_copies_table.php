<?php

use App\Models\Copy;
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
        Schema::create('copies', function (Blueprint $table) {
            $table->id('copy_id');
            //létrehozza a mezőt és össze is köti a megf. tábla megf. mezőjével
            $table->foreignId('book_id')->references('book_id')->on('books');
            $table->boolean('hardcovered')->default(0);
            $table->year('publication');
            //alapból a könyvtárban (0), ki van adva: 1, selejtre ítélve: 2
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        Copy::create(['book_id'=>2, 'publication'=>'2010', 'status'=>1]);
        Copy::create(['book_id'=>3, 'publication'=>'2016', 'status'=>1]);
        Copy::create(['book_id'=>3, 'hardcovered'=>1, 'publication'=>'2000']);
        Copy::create(['book_id'=>3, 'publication'=>'2020']);
        Copy::create(['book_id'=>3, 'hardcovered'=>1, 'publication'=>'2022', 'status'=>2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('copies');
    }
};
