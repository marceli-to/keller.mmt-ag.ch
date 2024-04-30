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
    'code',
    'published'
  ];
  
  protected $casts = [
    'published' => 'boolean'
  ];

  protected $dates = [
    'date'
  ];

  protected $appends = [
    'dateString'
  ];


  public function media()
  {
    return $this->hasMany(Media::class);
  }

  public function getDateStringAttribute()
  {
    return \Carbon\Carbon::parse($this->date)->translatedFormat('d. F Y');
  }
}
