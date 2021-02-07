<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Quote;
class MainController extends Controller
{
    public function index()
    {
    //$users = Quote::all();
    $users = Quote:: orderBy('date_q','desc')->paginate(10);
    return view ('welcome',compact('users'));
   //  dd($req);
    }
}
