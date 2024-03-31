<?php
namespace App\Livewire\Forms;
use App\Models\Client;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClientForm extends Form
{
  public ?Client $client;

  #[Validate('required')]
  public $name = '';
  
  #[Validate('required')]
  public $acronym = '';

  public $byline = '';

  #[Validate('required')]
  public $street = '';
  
  #[Validate('required')]
  public $zip = '';
  
  #[Validate('required')]
  public $city = '';

  public function setClient(Client $client)
  {
    $this->client = $client;
    $this->name = $client->name;
    $this->acronym = $client->acronym;
    $this->byline = $client->byline;
    $this->street = $client->street;
    $this->zip = $client->zip;
    $this->city = $client->city;
  }

  public function store() 
  {
    $this->validate();
    Client::create(
      $this->only([
        'name', 
        'acronym',
        'byline',
        'street',
        'zip',
        'city',
      ])
    );
    $this->reset(); 
  }

  public function update()
  {
    $this->validate();
    $this->client->update(
      $this->only([
        'name', 
        'acronym',
        'byline',
        'street',
        'zip',
        'city',
      ])
    );
  }
}
