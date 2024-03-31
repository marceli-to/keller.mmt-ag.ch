<?php
namespace App\Livewire\Client;
use App\Livewire\Forms\ClientForm;
use App\Models\Client;
use Livewire\Attributes\Validate; 
use Livewire\Component;

class CreateClient extends Component
{
  public ClientForm $form; 

  protected $view = 'livewire.pages.client.form';

  public function save()
  {
    $this->form->store();
    return $this->redirect(route('client.index'), navigate: true);
  }

  public function render()
  {
    return view($this->view);
  }
}
