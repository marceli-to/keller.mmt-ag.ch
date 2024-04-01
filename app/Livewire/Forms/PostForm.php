<?php
namespace App\Livewire\Forms;
use App\Models\Post;
use App\Models\Media;
use Illuminate\Http\File;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
  public ?Post $post;

  #[Validate('required')]
  public $date = '';

  public $text = '';

  public $published = true;

  public $images = [];

  public function setPost(Post $post)
  {
    $this->post = $post;
  }

  public function store() 
  {
    $this->validate();
    $post = Post::create(
      $this->only([
        'date',
        'text',
        'published',
      ])
    );

    if ($this->images)
    {
      foreach ($this->images as $image)
      {
        $filename = uniqid() . '_' . $image['name'];
        $filename = preg_replace('/[^A-Za-z0-9._-]/', '', $filename);
        \Storage::putFileAs('public/uploads', new File($image['path']), $filename);
  
        Media::create([
          'name' => $filename,
          'extension' => $image['extension'],
          'size' => $image['size'],
          'post_id' => $post->id,
        ]);
      }
    }

    $this->reset(); 
  }

}
