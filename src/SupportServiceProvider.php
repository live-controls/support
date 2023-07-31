<?php

namespace LiveControls\Support;

use Illuminate\Support\ServiceProvider;

class SupportServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'livecontrols_support');
  }

  public function boot()
  {
    $migrationsPath = __DIR__.'/../database/migrations/';
    $migrationPaths = [
      $migrationsPath,
    ];
    
    $this->loadMigrationsFrom($migrationPaths);
    $this->loadViewsFrom(__DIR__.'/../resources/views', 'livecontrols_support');
    $this->loadTranslationsFrom(__DIR__.'/../lang', 'livecontrols');

    if ($this->app->runningInConsole())
    {
      $this->publishes([
        __DIR__.'/../config/config.php' => config_path('livecontrols_support.php'),
      ], 'livecontrols.support.config');

      $this->publishes([
        __DIR__.'/../lang' => $this->app->langPath('vendor/livecontrols'),
      ], 'livecontrols.support.localization');
    }
  }
}
