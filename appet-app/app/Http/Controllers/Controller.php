<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $user = auth()->user();

        if($user->hasRole('user')) {
            $this->authorize('dashboard');
            return view ('dashboard');

        } else {
            $this->authorize('admin-dashboard');
            return view ('admin.dashboard');
        }
    }
}
