<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ensemble;
use App\Models\Useroption;

class HomeController
{
    public function index()
    {
        if((auth()->id() === 1) || (auth()->id() ===27))
        {
            return view('admin.home');
        }else{

            return view('users.home',
                [
                    'ensembles' => Ensemble::where('user_id', auth()->id())
                        ->where('school_id', auth()->user()->school->id)
                        ->get(),
                    'useroptions' => Useroption::where('user_id', auth()->id())->get(),
                ]
            );
        }
    }
}
