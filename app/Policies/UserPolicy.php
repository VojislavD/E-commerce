<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before(User $user)
    {
        if($user->email === 'admin@example.com') { //admin
            return true;
        }
    }

    public function view(User $user, User $model)
    {
        return ($user->is($model)) 
                ? Response::allow()
                : Response::deny('You don\'t have permission to see this page.');
    }
}
