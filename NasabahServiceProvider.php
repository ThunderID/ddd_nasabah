<?php

namespace App\Nasabah;

use Illuminate\Support\ServiceProvider;

class NasabahServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishMigrations();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->bindingRepositories();
        
    }

    public function publishMigrations()
    {
        $path       = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'migrations');
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/database/migrations/';
    }

    public function bindingRepositories()
    {
       $this->app->bind('\App\Nasabah\Repositories\InterfaceRepositoryNasabah', '\App\Nasabah\ORM\RepositoryNasabahEloquent' );
    }
}
