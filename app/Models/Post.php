<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'body', 'is_published'];

  public static function published()
  {
    return self::where('is_published', true);
  }

  public static function unpublished()
  {
    return self::where('is_published', false);
  }

  public function getRandomNumber()
  {
    return 4;
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
