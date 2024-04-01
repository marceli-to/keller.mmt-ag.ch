<?php
use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
  public LoginForm $form;

  /**
   * Handle an incoming authentication request.
   */
  public function login(): void
  {
    $this->validate();
    $this->form->authenticate();
    Session::regenerate();
    $this->redirect(
      session('url.intended', RouteServiceProvider::HOME),
      navigate: false
    );
  }
}; ?>
<div>
  <x-auth.intro class="mb-24">
    {{ __('Sign in to your account using the provided email and password.') }}
  </x-auth.intro>

  <x-auth.status 
    class="mb-16" 
    :status="session('status')" />

  <form wire:submit="login" class="space-y-32">

    <div>
      <x-form.label 
        for="email" 
        :value="__('E-Mail')" />

      <x-form.input 
        wire:model="form.email" 
        id="email" 
        type="email" 
        name="email" 
        required 
        autofocus
        autocomplete />
      <x-form.error :messages="$errors->get('email')" />
    </div>

    <div>
      <x-form.label 
        for="password" 
        :value="__('Password')" />

      <x-form.input 
        wire:model="form.password" 
        id="password" 
        type="password"
        name="password"
        autocomplete
        required />
      <x-form.error :messages="$errors->get('password')" />
    </div>

    <div class="flex items-center justify-between">

      <x-buttons.primary type="submit" name="login">
        {{ __('Login') }}
      </x-buttons.primary>

      @if (Route::has('password.request'))
        <x-auth.helper-link route="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </x-auth.helper-link>
      @endif
      
    </div>

  </form>
</div>
