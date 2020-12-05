<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $profiles = Profile::all();
        foreach ($profiles as $profile){
            $roles = $profile->roles;
            dump($roles);

            foreach ($roles as $role){
                $parent = $role->parent;
                $children = $role->children;
                dump($parent);
                dump($children);
            }

        }

        $user = auth()->user();
        $profile = $user->profile;
        dump($profile);

        return view('home');
    }
}
