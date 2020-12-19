<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('name','!=','admin')->latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user) 
    {
        $this->authorize('view', $user);
    	return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('view', $user);
    	request()->validate([
    		'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user)],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'phone' => ['required', 'string', 'max:20'],
            'postal_code' => ['required', 'string'],
            'city' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
    	]);

        $user->update([
            'name' => request('name'),
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'postal_code' => request('postal_code'),
            'city' => request('city'),
            'address' => request('address'),
            'password' =>  bcrypt(request('password'))
        ]);

        if(auth()->user()->isAdmin()) {
            return redirect('/admin/user/'.$user->name)->with('userUpdated', 'Users informations are successfully updated.');
        } else {
            return redirect()->route('home')->with('userUpdated', 'Users informations are successfully updated.');
        }
    }

    public function search()
    {
        if(empty(request('keyword'))) {
            $users = User::where('name', '!=', 'Admin')->latest()->paginate(10);
        } else {
            $users = User::where('name','!=','Admin')->where('first_name', 'LIKE','%'.request('keyword').'%')->orWhere('last_name','LIKE','%'.request('keyword').'%')->paginate(10);
        }

        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $this->authorize('view', $user);
        $user->delete();

        return redirect('/login')->with('userDeleted', 'User account successfully deleted.');
    }
}
