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
      $table->id();
      $table->string('name')->unique();
      $table->timestamps();
    });

    Schema::create('article_tag', function (Blueprint $table) { //connect 2 tables, pivot table, alphabetical order "article_tag" not  tag_article 
      $table->id();
      $table->unsignedBigInteger('article_id');
      $table->unsignedBigInteger('tag_id');
      $table->timestamps();

      $table->unique(['article_id', 'tag_id']);

      $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade'); //article_id reference id column on articles table and if we delete the article cascade and delete as well 
      $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('article_tag');
    Schema::dropIfExists('tags');
  }
}
