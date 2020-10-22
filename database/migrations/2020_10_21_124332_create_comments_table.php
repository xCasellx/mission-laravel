<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("text");
            $table->boolean("edit_check")->default(0);
            $table->foreignId("parent_id")->nullable();
            $table->foreignId("user_id");
            $table->foreign('parent_id')->references('id')->on('comments');
            $table->foreign('user_id')->references('id')->on('users');
        });
        return redirect(r);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
