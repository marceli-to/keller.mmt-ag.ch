<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;
  
  protected $fillable = [
    'date',
    'text',
    'published'
  ];
  
  protected $casts = [
    'published' => 'boolean'
  ];

  protected $dates = [
    'date'
  ];

  public function media()
  {
    return $this->hasMany(Media::class);
  }

  public function getDateAttribute($value)
  {
    return \Carbon\Carbon::parse($value)->translatedFormat('d. F Y');
  }
}
