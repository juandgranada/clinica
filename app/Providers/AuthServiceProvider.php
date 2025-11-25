<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 🔥 Permisos según rol de tu tabla usuarios

        Gate::define('ADMINISTRADOR', function ($user) {
            return $user->rol === 'ADMINISTRADOR';
        });

        Gate::define('ADMINISTRADOR-MEDICO', function ($user) {
            return in_array($user->rol, ['ADMINISTRADOR', 'MEDICO']);
        });

        Gate::define('PACIENTE', function ($user) {
            return $user->rol === 'PACIENTE';
        });
    }
}
