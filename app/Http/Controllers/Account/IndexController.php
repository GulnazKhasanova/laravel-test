<?php

namespace App\Http\Controllers\Account;

use App\Http\Traits\FilterTrait;
use App\Http\Traits\TasksTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
     use FilterTrait;
}
