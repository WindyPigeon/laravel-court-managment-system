<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'facility_id',
    ];

    protected $casts = [
        'reserved_courts' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_cancelled' => 'boolean',
    ];
    
    /**
	 * Get the user that owns the reservation.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function user()
    {
        return belongsTo(User::class);
    }

    /**
	 * Get the facility that owns the reservation.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function facility()
    {
        return belongsTo(Facility::class);
    }

    public function scopeOfFacility($query, $facility_id) {
        return $query->where('facility_id', $facility_id);
    }
}
