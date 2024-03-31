<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
  #[Locked]
  public string $token = '';
  public string $email = '';
  public string $password = '';
  public string $password_confirmation = '';

  /**
   * Mount the component.
   */
  public function mount(string $token): void
  {
    $this->token = $token;
    $this->email = request()->string('email');
  }

  /**
   * Reset the password for the given user.
   */
  public function resetPassword(): void
  {
    $this->validate([
      'token' => ['required'],
      'email' => ['required', 'string', 'email'],
      'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
    ]);

    // Here we will attempt to reset the user's password. If it is successful we
    // will update the password on an actual user model and persist it to the
    // database. Otherwise we will parse the error and return the response.
    $status = Password::reset(
      $this->only('email', 'password', 'password_confirmation', 'token'),
      function ($user) {
        $user->forceFill([
          'password' => Hash::make($this->password),
          'remember_token' => Str::random(60),
        ])->save();
        event(new PasswordReset($user));
      }
    );

    // If the password was successfully reset, we will redirect the user back to
    // the application's home authenticated view. If there is an error we can
    // redirect them back to where they came from with their error message.
    if ($status != Password::PASSWORD_RESET) {
      $this->addError('email', __($status));
      return;
    }
    Session::flash('status', __($status));
    $this->redirectRoute('login', navigate: true);
  }
}; ?>

<div>

  <x-auth.intro class="mb-24">
    {{ __('Set a new password for your account using your email addressed used in the registration process.') }}
  </x-auth.intro>

  <form wire:submit="resetPassword" class="space-y-32">

    <!-- Email Address -->
    <div>
      <x-form.label for="email" :value="__('Email')" />
      <x-form.text 
      wire:model="email" 
      id="email" 
      type="email" 
      name="email" 
      required 
      autofocus 
      autocomplete="username" />
      <x-form.error :messages="$errors->get('email')" />
    </div>

    <!-- Password -->
    <div>
      <x-form.label 
        for="password" 
        :value="__('Password')" />

      <x-form.text 
        wire:model="password" 
        id="password" 
        type="password" 
        name="password" 
        required 
        autocomplete="new-password" />
      <x-form.error :messages="$errors->get('password')" />
    </div>

    <!-- Confirm Password -->
    <div>
      <x-form.label 
        for="password_confirmation" 
        :value="__('Confirm Password')" />

      <x-form.text 
        wire:model="password_confirmation" 
        id="password_confirmation" 
        type="password"
        name="password_confirmation" 
        required 
        autocomplete="new-password" />
      <x-form.error :messages="$errors->get('password_confirmation')" />
    </div>

    <div class="flex items-center justify-between">

      <x-buttons.primary>
        {{ __('Reset Password') }}
      </x-buttons.primary>

      <x-auth.helper-link route="{{ route('login') }}">
        {{ __('Back to login') }}
      </x-auth.helper-link>
      
    </div>
  </form>
</div>
