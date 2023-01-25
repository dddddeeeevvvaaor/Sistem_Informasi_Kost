<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FacilityRoomType extends Model
{
    use HasFactory;

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['facility_id', 'room_type_id'];

    public static function getDataByRoomType($room_type_id)
    {
        return FacilityRoomType::where('room_type_id', $room_type_id)->get();
    }

    public static function store(Request $request, $room_type_id)
    {
        foreach ($request->facility_id as $facility) {
            FacilityRoomType::create([
                'facility_id' => $facility,
                'room_type_id' => $room_type_id,
            ]);
        }
    }

    public static function destroy($room_type_id)
    {
        FacilityRoomType::where('room_type_id', $room_type_id)->delete();
    }
}
