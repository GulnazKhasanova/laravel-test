<?php

namespace App\Http\Controllers\Account;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        if(Auth::user()->is_admin !==true){
            $el = Tasks::whereHas('user', $filter = function($query) {
                $query->where('id', Auth::user()->id);})
                ->with(['user' => $filter])
                ->get();
            $tasks = $el;
        }else {
            $tasks = Tasks::all();
        }


        return view('account.index',compact('tasks'));
    }
}
