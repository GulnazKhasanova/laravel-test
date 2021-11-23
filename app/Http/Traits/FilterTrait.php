<?php


namespace App\Http\Traits;
use App\Models\Tasks;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

trait FilterTrait
{
    use TasksTrait;
    public function filter(Request $request){
            $tasks = $this->tasks();

            if($request->task !== null){
                $el = $tasks->where('name', $request->task);
                $tasks = $el;
            }

            $alltasks = $this->tasks();

        return view('account.index', compact(['tasks','alltasks']));
  }

}
