<?php

use App\Models\Lending;
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
        Schema::create('lendings', function (Blueprint $table) {
            $table->id("lending_id");
            $table->foreignId("user_id")->references('id')->on('users');
            $table->foreignId("copy_id")->references('copy_id')->on('copies');
            $table->date("start");
            $table->timestamps();
            // $table->primary(["user_id", "copy_id", "start"]);
        });

        Lending::create(['user_id'=>1, 'copy_id'=>1, 'start'=>'2022-04-01']);
        Lending::create(['user_id'=>2, 'copy_id'=>2, 'start'=>'2022-07-14']);
        Lending::create(['user_id'=>3, 'copy_id'=>3, 'start'=>'2022-10-20']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lendings');
    }
};
