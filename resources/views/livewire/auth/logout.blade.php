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
  class="block py-15 md:py-0 md:pt-30 leading-none md:border-t-2 md:border-transparent  hover:md:border-t-2 hover:md:border-black" 
  title="Logout"
  wire:click="logout">
  Logout
</a>
