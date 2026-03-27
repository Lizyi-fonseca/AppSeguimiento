<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    
   

    Gate::define('es-administrador', function (User $user){
        return $user->rol === User::ROL_ADMINISTRADOR; 
    });

    
    Gate::define('es-instructor', function (User $user){
        return $user->rol === User::ROL_INSTRUCTOR; 
    });

     Gate::define('es-superadministrador', function (User $user){
        return $user->rol === User::ROL_SUPERADMINISTRADOR; 
    });
    
    Gate::define('es-aprendiz', function (User $user){
        return $user->rol === User::ROL_APRENDIZ; 
    });
     

    }
}
