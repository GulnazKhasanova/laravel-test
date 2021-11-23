<?php


namespace App\Http\Traits;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait TasksTrait
{
    public function tasks()
    {

        if(Auth::user()->is_admin !==true){
            $tasks = Tasks::whereHas('user', $filter = function($query) {
                $query->where('id', Auth::user()->id);})
                ->with(['user' => $filter])
                ->get();

        }else {
            $tasks = Tasks::all();
        }
        $alltasks = $tasks;

        return $alltasks;
    }
}
