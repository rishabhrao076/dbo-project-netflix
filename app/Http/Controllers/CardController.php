<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    //
    public function view(Request $request)
    {
        $card = DB::select("select * from card_information where uuid_column='" .$request->cardid."'");
        // dd($card);
        if(count($card) > 0) {
            $card=$card[0];
            return view('card', compact('card'));        
        }else {
            return abort(404);
        }
       
    }

    public function update(Request $request) {
        // Request Comes here fire update query here
        dd($request);
    }
}
