<?php
namespace App\Livewire\Client;
use App\Livewire\ListComponent;
use App\Models\Client;
use Livewire\Component;

class ListClient extends ListComponent
{
  protected $view = 'livewire.pages.client.list';

  public function delete(Client $client)
  {
    $client->delete();
    return redirect(route('client.index'));
  }

  public function render()
  {
    return view($this->view)->with([
      'clients' => Client::search('name', $this->search)->orderBy($this->field, $this->direction)->paginate($this->paginationLimit),
    ]);
  }

}