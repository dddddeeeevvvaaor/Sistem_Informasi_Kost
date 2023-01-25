<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'currency',
    ];

    /**
     * Get all of the rooms for the RoomType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    /**
     * The facility that belong to the RoomType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function facility()
    {
        return $this->belongsToMany(Facility::class, 'facility_room_types', 'room_type_id', 'facility_id');
    }

    public static function index()
    {
        return RoomType::with('facility')->get();
    }

    public static function store(Request $request)
    {
        $roomType = RoomType::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'currency' => $request->currency,
        ]);
        return $roomType->id;
    }

    public static function edit(Request $request, RoomType $roomType)
    {
        $roomType->update($request->all());
    }
}
