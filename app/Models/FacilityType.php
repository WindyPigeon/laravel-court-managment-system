<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sport'
    ];

    
    /**
	 * Get the facilities for the facility type.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}
