<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    //authorize player entry
    //input:access token
    //output:if match, generate gameview else return error
    /**
     * handle the incoming request.
     *
     * @param  \illuminate\http\request  $request
     * @return \illuminate\http\response
     */
    public function authPlayer(Request $request){

    }

    //move made by player, compare with board values in db, return validity, report to all players
    //input: board values
    //return: validity
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

    }
}
