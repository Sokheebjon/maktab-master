<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements("id")->unsigned();
            $table->string("title_uz");
            $table->string("title_ru");
            $table->text("about_uz");
            $table->text("about_ru");
            $table->string("slug");
            $table->string("image");
            $table->string('status')->default(1);
            $table->datetime('begin_date');
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
        Schema::dropIfExists('events');
    }
}
