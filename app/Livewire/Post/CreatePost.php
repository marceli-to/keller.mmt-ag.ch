<?php
namespace App\Livewire\Post;
use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Attributes\Validate; 
use Livewire\Component;

class CreatePost extends Component
{
  public PostForm $form; 
  
  public $clients = [];

  public $showDialog = false;

  protected $view = 'livewire.pages.post.form';

  public function __construct()
  {
  }

  public function save()
  {
    $this->form->store();
    return $this->redirect(route('page.home'), navigate: true);
  }

  public function render()
  {
    return view($this->view);
  }
}
