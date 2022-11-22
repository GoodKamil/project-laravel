<?php

namespace App\Providers;

use App\Enum\UserRole;
use App\Models\Users;
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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->definedUserRoleGate('isAdmin',UserRole::ADMIN);
        $this->definedUserRoleGate('isSuperEmployee',UserRole::SUPEREMPLOYEE);
        $this->definedUserRoleGate('isEmployee',UserRole::EMPLOYEE);
        $this->definedUserRoleGateTwoUsers();
    }

    private function definedUserRoleGate(string $name,int $role)
    {
        Gate::define($name,function (Users $user) use ($role){
         return $user->positions->role===$role;
         });
    }

    private function definedUserRoleGateTwoUsers()
    {
        Gate::define('isAdminOrSuperEmployee',function (Users $user){
            return in_array($user->positions->role, [2, 3], true);
        });
    }
}
