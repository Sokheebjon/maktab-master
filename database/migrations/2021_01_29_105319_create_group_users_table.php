<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_users', function (Blueprint $table) {
            $table->bigIncrements("id")->unsigned();
            $table->timestamps();
//            $table->bigInteger('group_id')->unsigned()->index();
//            $table->bigInteger('user_id')->unsigned()->index();

//            $table->foreign("group_id")->references("id")->on("groups")->onUpdate('cascade')->onDelete("cascade");
//            $table->foreign("user_id")->references("id")->on("users")->onUpdate('cascade')->onDelete("cascade");

            $table->foreignId('group_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_users');
    }
}
