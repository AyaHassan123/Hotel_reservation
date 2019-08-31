<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\HotelRoom;
use App\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Hotelcontroller extends Controller
{
    public function show($username){
            $user = Hotel::where('username',$username)->first();
            return view('profile')->with(['hotel'=>$user]);
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::id();


            $user = $request->all();
            $user['username'] = Auth::user();
            $user->update();
            $user->save();

        } else {
            return response('Forbidden', 403);
        }
    }
    //delete hotels data
        public function delete(Request $request){
            if (Auth::check()) {
                $user['username'] = Auth::user();
                $user->delete();

            }
            else{
                return response('Forbidden', 403);
            }

        }
        //delete hotels_room
    public function deleteroom(Request $request){
        if (Auth::check()) {
            $room = $request->all();
            DB::delete('delete from hotel_room where id = ?',[$room['id']]);

        }
        else{
            return response('Forbidden', 403);
        }

    }



}
