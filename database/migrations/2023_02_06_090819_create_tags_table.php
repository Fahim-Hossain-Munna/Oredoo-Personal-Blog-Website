<?php

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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tag_name')->unique();
            $table->string('tag_slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('blogpost_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('blogpost_id');
            $table->integer('tag_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('blogpost_tag');
    }
};
