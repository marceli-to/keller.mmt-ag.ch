<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
  public string $email = '';

  /**
   * Send a password reset link to the provided email address.
   */
  public function sendPasswordResetLink(): void
  {
    $this->validate([
      'email' => ['required', 'string', 'email'],
    ]);

    // We will send the password reset link to this user. Once we have attempted
    // to send the link, we will examine the response then see the message we
    // need to show to the user. Finally, we'll send out a proper response.
    $status = Password::sendResetLink(
      $this->only('email')
    );

    if ($status != Password::RESET_LINK_SENT) {
      $this->addError('email', __($status));
      return;
    }

    $this->reset('email');
    session()->flash('status', __($status));
  }
}; ?>
<div>
  <x-auth.intro class="mb-24">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
  </x-auth.intro>

  <x-auth.status 
    class="mb-16" 
    :status="session('status')" />
    
  <form wire:submit="sendPasswordResetLink" class="space-y-32">

    <div>
      <x-form.label 
        for="email" 
        :value="__('E-Mail')" />

      <x-form.input 
        wire:model="email" 
        id="email" 
        type="email" 
        name="email" 
        required 
        autofocus />
      <x-form.error :messages="$errors->get('email')" />
    </div>

    <div class="flex items-center justify-between">
      
      <x-buttons.primary type="submit" name="send-reset-link">
        {{ __('Get Reset Link') }}
      </x-buttons.primary>

      <x-auth.helper-link route="{{ route('login') }}">
        {{ __('Back to login') }}
      </x-auth.helper-link>
      
    </div>

  </form>
</div>
