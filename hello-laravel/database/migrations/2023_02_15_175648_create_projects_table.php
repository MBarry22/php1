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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->unique('key1');
            $table->string('slug', 255)->unique('key2');
            $table->text('excerpt');
            $table->text('body');
            $table->string('url')->nullable(true);
            $table->date('published_date')->nullable(true);
            $table->foreignId('category_id')->nullable(true);
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
        Schema::dropIfExists('projects');
    }
};
