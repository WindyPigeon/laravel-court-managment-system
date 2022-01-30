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
        'id',
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
	 * Get the facility type that owns the facility.
	 *
	 * @return \Models\FacilityType
	 */
    public function facilityType()
    {
        return FacilityType::find($this->facility_type_id);
    }

    /**
     * Scope a query to only include facility of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('facilitytype', $type);
    }
}
