<?php

namespace App\Providers;

use App\Models\Entities\ExampleClass;
use App\Models\Repositories\ExampleRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private $repositorios = [
        ExampleRepository::class => ExampleClass::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositorios as $repositorio => $entidad){
            $this->app->bind($repositorio, function($app) use ($repositorio, $entidad){
                return new $repositorio($app['em'],
                    $app['em']->getClassMetaData($entidad)
                );
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
