<?php
namespace App\Livewire\Post;
use App\Livewire\ListComponent;
use App\Models\Post;
use Livewire\Component;

class ListPosts extends ListComponent
{
  protected $view = 'livewire.pages.post.list';

  public function delete(Post $post)
  {
    $post->delete();
    return redirect(route('page.home'));
  }

  public function toggle(Post $post)
  {
    $post->published = !$post->published;
    $post->save();
    return redirect(route('page.home'));
  }

  public function render()
  {
    $posts = auth()->check() ? 
      Post::orderBy('date', 'desc')->with('media')->get() : 
      Post::where('published', true)->with('media')->orderBy('date', 'desc')->get();

    return view($this->view)->with([
      'posts' => $posts,
    ]);
  }

}