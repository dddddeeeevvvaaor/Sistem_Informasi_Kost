<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Facility extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The roomType that belong to the Facility
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roomType()
    {
        return $this->belongsToMany(RoomType::class, 'facility_room_types', 'facility_id', 'room_type_id');
    }

    public static function index()
    {
        return Facility::all();
    }

    public static function store(Request $request)
    {
        Facility::create($request->all());
    }

    public static function edit(Request $request, Facility $facility)
    {
        $facility->update($request->all());
    }
}
