<?php
namespace App\Livewire\Post;
use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Attributes\Validate; 
use Livewire\Component;

class CreatePost extends Component
{
  public PostForm $form; 

  protected $view = 'livewire.pages.post.form';

  public function save()
  {
    $this->form->store();
    return $this->redirect(route('posts'), navigate: true);
  }

  public function render()
  {
    $this->form->date = date('Y-m-d');
    return view($this->view);
  }
}
