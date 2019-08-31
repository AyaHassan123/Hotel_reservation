<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    protected $fillable=['price','number'];

    public function hotels(){
        return $this->foreign('hotel_id')->references('id')->on('hotel')->onDelete('cascade');
      // return $this->hasMany(Hotel::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }

}
