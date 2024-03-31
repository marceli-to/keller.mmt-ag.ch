<?php
use App\Models\User;
use App\Models\Client;

test('client listing page is displayed', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $response = $this->get('/clients');
    $response
        ->assertOk()
        ->assertSeeLivewire('client.list-client');
});

test('client creation page is displayed', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $response = $this->get('/client/create');
    $response
        ->assertOk()
        ->assertSeeLivewire('client.create-client');
});

test('client is created', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = Client::create([
      'name' => 'Test Client',
      'acronym' => 'TC',
      'byline' => 'Test Client byline',
      'street' => 'Test Street 1',
      'zip' => '12345',
      'city' => 'Test City',
    ]);

    $this->assertDatabaseHas('clients', [
      'name' => 'Test Client',
      'acronym' => 'TC',
      'byline' => 'Test Client byline',
      'street' => 'Test Street 1',
      'zip' => '12345',
      'city' => 'Test City',
    ]);
});

test('client update page is displayed', function () {
  $user = User::factory()->create();
  $this->actingAs($user);

  $client = Client::factory()->create();
  $response = $this->get('/client/update/' . $client->id);
  $response
      ->assertOk()
      ->assertSeeLivewire('client.update-client');
});

test('client is updated', function() {
  $user = User::factory()->create();
  $this->actingAs($user);

  $client = Client::create([
    'name' => 'Test Client',
    'acronym' => 'TC',
    'byline' => 'Test Client byline',
    'street' => 'Test Street 1',
    'zip' => '12345',
    'city' => 'Test City',
  ]);

  $client->update([
    'name' => 'Test Client 2',
    'acronym' => 'TC',
    'byline' => 'Test Client byline',
    'street' => 'Test Street 1',
    'zip' => '12345',
    'city' => 'Test City',
  ]);

  $this->assertDatabaseHas('clients', [
    'name' => 'Test Client 2',
    'acronym' => 'TC',
    'byline' => 'Test Client byline',
    'street' => 'Test Street 1',
    'zip' => '12345',
    'city' => 'Test City',
  ]);
});
