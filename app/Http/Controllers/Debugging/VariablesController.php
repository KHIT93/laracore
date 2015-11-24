<?php namespace App\Http\Controllers\Debugging;

use App\Http\Requests;
use App\Models\Variable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VariablesController extends Controller
{
    public function getIndex()
    {
        return Variable::all();
    }
}