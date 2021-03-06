<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements("id")->unsigned();
            $table->string('name')->unique();
            $table->bigInteger('teacher_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('groups', function(Blueprint $table) {
            $table->foreign("teacher_id")->references("id")->on("users")->onUpdate('cascade')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
