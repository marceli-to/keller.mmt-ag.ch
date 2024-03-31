<?php
namespace App\Livewire\Client;
use App\Livewire\Forms\ClientForm;
use Livewire\Component;
use App\Models\Client;
 
class UpdateClient extends Component
{
  public ClientForm $form;

  protected $view = 'livewire.pages.client.form';

  public function mount(Client $client)
  {
    $this->form->setClient($client);
  }

  public function save()
  {
    $this->form->update();
    return $this->redirect(route('client.index'), navigate: true);
  }

  public function render()
  {
    return view($this->view);
  }
}