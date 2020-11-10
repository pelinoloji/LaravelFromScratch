<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tags', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->timestamps();
    });

    Schema::create('article_tag', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('article_id');
      $table->unsignedBigInteger('tag_id');
      $table->timestamps();

      $table->unique(['article_id', 'tag_id']);
      //$table->string('name')->unique();
      //$table->string(['article_id', 'tag_id'])->unique();

      //$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade'); //article_id reference id column on articles table and if we delete the article cascade and delete as well 
      //$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
    // Schema::dropIfExists('article_tag');
  }
}
