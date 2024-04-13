<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  protected $fillable = [
    'name',
    'extension',
    'size',
    'order',
    'post_id'
  ];

  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}
