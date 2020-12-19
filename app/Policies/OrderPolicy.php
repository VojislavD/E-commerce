<?php

namespace App\Policies;

use App\User;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
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
    
    public function view(User $user, Order $order)
    {
        return ($user->email === $order->email)
            ? Response::allow()
            : Response::deny('You don\'t have permission to see this page.');
    }
}
