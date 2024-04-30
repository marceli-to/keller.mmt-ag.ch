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

  public $code = ''; 

  public $published = true;

  public $images = [];

  public $media = [];

  public function setPost(Post $post)
  {
    $post = Post::with('media')->findOrFail($post->id);
    $this->post = $post;
    $this->date = date('Y-m-d', strtotime($post->date));
    $this->text = $post->text;
    $this->code = $post->code;
    $this->published = $post->published;
    $this->media = $post->media;
  }

  public function store() 
  {
    $this->validate();
    $post = Post::create(
      $this->only([
        'date',
        'text',
        'code',
        'published',
      ])
    );

    $this->handleMedia($post);
    $this->reset(); 
  }

  public function update()
  {
    $this->validate();
    $this->post->update(
      $this->only([
        'date', 
        'text',
        'code',
        'published'
      ])
    );

    $this->handleMedia($this->post);

  }

  public function handleMedia(Post $post)
  {
    if ($this->images)
    {
      foreach ($this->images as $image)
      {
        $filename = uniqid() . '_' . $image['name'];
        $filename = preg_replace('/[^A-Za-z0-9._-]/', '', $filename);
        \Storage::putFileAs('public/uploads', new File($image['path']), $filename);

        // get image width and height
        list($width, $height) = getimagesize($image['path']);
  
        Media::create([
          'name' => $filename,
          'extension' => $image['extension'],
          'size' => $image['size'],
          'width' => $width,
          'height' => $height,
          'post_id' => $post->id,
        ]);
      }
    }
  }
}
