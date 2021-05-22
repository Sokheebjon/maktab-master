<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements("id")->unsigned();
            $table->string("title_uz");
            $table->string("title_ru");
            $table->text("about_uz");
            $table->text("about_ru");
            $table->string("slug");
            $table->string("image")->nullable();
            $table->enum('status', [1, 0]);
            $table->integer('views')->unsigned()->default(0);
            $table->bigInteger("category_id")->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('news', function(Blueprint $table) {
            $table->foreign("category_id")->references("id")->on("categories")->onUpdate('cascade')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
