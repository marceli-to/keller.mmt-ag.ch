<?php
namespace App\Livewire\Client;
use App\Livewire\Forms\ClientDialogForm;
use App\Models\Client;
use Livewire\Component;

class DialogClient extends Component
{
  public ClientDialogForm $form; 

  protected $view = 'livewire.pages.client.dialog';

  public function createClient()
  {
    $this->form->create();
  }

  public function render()
  {
    return view($this->view);
  }
}
