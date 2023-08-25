<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Offer extends Model
{
    use HasFactory;

    protected $table = 'offer_letters';
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
    
}