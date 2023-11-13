<?php

namespace App\Providers;

use App\Models\Entities\ExampleClass;
use App\Models\Entities\FechaDeCierreComunidad;
use App\Models\Entities\Rol;
use App\Models\Entities\Usuario_Plataforma;
use App\Models\Repositories\ExampleRepository;
use App\Models\Repositories\RepositorioDeUsuario;
use App\Models\Repositories\RepositorioFechaDeCierreComunidad;
use App\Models\Repositories\RepositorioRol;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private $repositorios = [
        ExampleRepository::class => ExampleClass::class,
        RepositorioRol::class => Rol::class,
        RepositorioFechaDeCierreComunidad::class => FechaDeCierreComunidad::class,
        RepositorioDeUsuario::class => Usuario_Plataforma::class
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
