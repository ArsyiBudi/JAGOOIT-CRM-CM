<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_OfferLetterJobsDetails extends Model
{
    use HasFactory;

    protected $table = 'offer_letter_jobs_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'offer_letters_id',
        'needed_job',
        'quantity',
        'city_location',
        'contract_duration'
    ];
}
