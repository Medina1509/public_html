<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Quote;
class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequest()

    {

        return view('ajaxRequest');

    }

   

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestPost(Request $req)

    {
  
    $input = $req->all();
     
  //  dd($req);
  $vehicles = $req->vehicle; 

    $name =$req->name;
    $author =$req->author;
    date_default_timezone_set("Europe/Moscow");
    $mytime = date('Y-m-d H:i:s');
    
    $quotes = DB::table('quotes')->insert(['name' => $author,'text_q'=> $name,'tags'=> $vehicles, 'date_q'=> $mytime ]);
   //  $quotes = DB::table('quotes')->insert(['name' =>  $author,'text_q'=> $name,'tags'=>  $vehicles, 'date_q'=> $mytime ]);
        //return response()->json(['success'=>'Well done!']);
    
       

    }

}
