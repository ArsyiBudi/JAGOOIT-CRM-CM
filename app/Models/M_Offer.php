<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class M_Offer extends Model
{
    use HasFactory;

    protected $table = 'offer_letters';
    protected $guarded = [
        'id', 
    ];

    protected $primaryKey = 'id';
    protected $fillable = [
        'letter_number',
        'date',
        'location',
        'offer_subject',
        'recipient_name',
        'context',
        'talent_total',
        'weekday_cost',
        'weekend_cost',
        'consumtion_cost',
        'transportation_cost',
    ];

    public function offerJob() : HasOne
    {
        return $this->hasOne(M_OfferLetterJobsDetails::class, 'offer_letters_id');
    }
    public function offerJobDetails() : HasMany
    {
        return $this->hasMany(M_OfferLetterJobsDetails::class, 'offer_letters_id');
    }
}