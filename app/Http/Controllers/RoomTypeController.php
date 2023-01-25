<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;
use App\Models\RoomType;
use App\Models\Facility;
use App\Models\FacilityRoomType;

class RoomTypeController extends Controller
{
    public function index()
    {
        return view('room_types.index', ['roomTypes' => RoomType::index()]);
    }

    public function create()
    {
        $facilities = Facility::all();
        return view('room_types.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',
        ]);
    
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        $room_type_id = RoomType::store($request);
        FacilityRoomType::store($request, $room_type_id);
        Alert::toast('Type Kamar baru berhasil dibuat.', 'success');
        return redirect()->route('roomTypes.index');
    }

    public function edit(RoomType $roomType)
    {   
        $facilities = Facility::all();
        $facility_roomTypes = FacilityRoomType::getDataByRoomType($roomType->id);
        return view('room_types.edit', compact('roomType', 'facilities', 'facility_roomTypes'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required|regex:/^[0-9]+$/',
        ]);
    
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        RoomType::edit($request, $roomType);
        FacilityRoomType::destroy($roomType->id);
        FacilityRoomType::store($request, $roomType->id);
        Alert::toast('Type Kamar berhasil diedit.', 'success');
        return redirect()->route('roomTypes.index');
    }

    public function destroy(RoomType $roomType)
    {
        FacilityRoomType::destroy($roomType->id);
        $roomType->delete();
        Alert::toast('Type Kamar berhasil dihapus.', 'success');
        return redirect()->route('roomTypes.index');
    }
}
