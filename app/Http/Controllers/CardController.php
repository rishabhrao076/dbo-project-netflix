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
        $request->validate(['cardid' => 'required|exists:card_information,uuid_column']);
        DB::update("update card_information set name='" . $request->name ."', card_number='" .$request->card_number ."', cvv='" . $request->cvv . "', expiry='" .$request->expiry . "' where uuid_column='" . $request->cardid ."'");
        // dd($request);
        return redirect('profile');

    }
    public function add(Request $request) {
        // Request Comes here fire update query here          $cards = DB::select("select * from card_information where user_id='" .$request->user()->user_id."'");

        DB::insert("insert into card_information(name,card_number,expiry,cvv,user_id) values ('"  .$request->name . "','" . $request->number . "','" . $request->expiry . "','" . $request->cvv . "'," . $request->user()->user_id.")") ;
        return redirect('profile');
        dd($request->number);
    }

    public function delete(Request $request) {
        $request->validate(['cardid' => 'required|exists:card_information,uuid_column']);
        // Request Comes here fire update query here
        DB::delete("delete from card_information where uuid_column = '".$request->cardid."'");

        return redirect('profile');
        dd($request);
    }
}
