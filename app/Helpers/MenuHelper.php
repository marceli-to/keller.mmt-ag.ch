<?php
namespace App\Helpers;

class MenuHelper
{
  public static function isActive($route)
  {
    // route ususally is a string like 'client.index' or 'client.create'
    // we just need the first part of the string
    $route = explode('.', $route)[0];

    return \Route::is($route . '*');

  }
}