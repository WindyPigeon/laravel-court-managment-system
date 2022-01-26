<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id'
        'facility_type_id',
        'location',
    ];

    protected $casts = [
        'number_of_courts' => 'integer',
        'is_indoor' => 'boolean',
    ];

    /**
	 * Get the reservations for the facility.
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
	 * Get the facilit ytype that owns the facility.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function facilitytype()
    {
        return belongsTo(User::class);
    }
}
