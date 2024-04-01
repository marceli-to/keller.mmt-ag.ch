<?php
namespace App\Livewire\Post;
use App\Livewire\Forms\PostForm;
use Livewire\Component;
use App\Models\Post;
 
class UpdatePost extends Component
{
  public PostForm $form;

  protected $view = 'livewire.pages.post.form';

  public function mount(Post $post)
  {
    $this->form->setPost($post);
  }

  public function save()
  {
    $this->form->update();
    return $this->redirect(route('page.home'), navigate: true);
  }

  public function render()
  {
    return view($this->view);
  }
}