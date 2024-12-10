<?php

namespace Niranjannsahoo\Odkcentralapi;

use Illuminate\Support\ServiceProvider;

class OdkCentralApiServiceProvider extends ServiceProvider
{
  public function boot()
  {
    $this->publishes([
      __DIR__ . '/../config/odkcentral.php' => config_path('odkcentral.php'),
    ], 'config');
  }

  public function register()
  {
    $this->mergeConfigFrom(
      __DIR__ . '/../config/odkcentral.php',
      'odkcentral'
    );

    $this->app->singleton('odkcentralapi', function () {
      return new OdkCentralApi();
    });
  }
}
