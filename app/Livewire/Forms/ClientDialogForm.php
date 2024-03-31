<?php
namespace App\Livewire\Forms;
use App\Models\Client;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClientDialogForm extends Form
{
  #[Validate('required')]
  public $name = '';
  
  #[Validate('required')]
  public $acronym = '';

  #[Validate('required')]
  public $city = '';

  public function create() 
  {
    $this->validate();
    Client::create(
      $this->only([
        'name', 
        'acronym',
        'city',
      ])
    );
    $this->reset(); 
  }

}
