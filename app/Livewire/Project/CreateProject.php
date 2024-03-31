<?php
namespace App\Livewire\Project;
use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use App\Models\Client;
use Livewire\Attributes\Validate; 
use Livewire\Component;

class CreateProject extends Component
{
  public ProjectForm $form; 
  
  public $clients = [];

  public $showDialog = false;

  protected $view = 'livewire.pages.project.form';

  public function __construct()
  {
    $this->clients = Client::all();
    $this->showDialog = false;
  }

  public function openDialog()
  {
    $this->showDialog = true;
  }

  public function save()
  {
    $this->form->store();
    return $this->redirect(route('project.index'), navigate: true);
  }

  public function render()
  {
    return view($this->view);
  }
}
