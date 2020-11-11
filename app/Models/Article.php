<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Article extends Model
{
  use HasFactory;
  protected $fillable = ['title', 'excerpt', 'body']; // OR you can use ====>  protected $guarded = [];   // Whichever you feel comfortable 

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }
}
