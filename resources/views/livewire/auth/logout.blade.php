<?php
use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
  public function logout(Logout $logout): void
  {
    $logout();
    $this->redirect('/');
  }
};
?>
<a href="javascript:;" 
  class="absolute top-10 right-10 p-4 text-sm text-gray-400 hover:text-black" 
  title="Logout"
  wire:click="logout">
  Logout
</a>
