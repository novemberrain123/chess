<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameViewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hostGame(Request $request)
    {
        //generate access token
        do{
            $accessToken = random_bytes(20);
            $existingToken = DB::select("SELECT access_token FROM games WHERE access_token = '$accessToken'");
            if(sizeof($existingToken) == 0){
                break;
            }

        }while(true);

        try{
            DB::beginTransaction();
            $gameStatus = "000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:000000000000000:";
            DB::insert("INSERT into games (created_at, host_ip, access_token, game_status) VALUES (?,?,?,?)", [time(), $request->ip(), $accessToken, $gameStatus]);
            DB::commit();
        }catch(\Exception $e){
            Log::debug($e);
            DB::rollBack();
        }
        //log ip of user
        //generate view
        return view('game', ['access_token' => $accessToken]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enterGame(Request $request)
    {
        //generate access token
        //log ip of user
        //generate view
        return view('game', ['']
    }

}
