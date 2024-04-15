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
  class="absolute bottom-10 left-20 z-50 p-4 text-xs text-black" 
  title="Logout"
  wire:click="logout">
  Logout
</a>
