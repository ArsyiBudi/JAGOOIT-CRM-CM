<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Leads extends Model
{
    use HasFactory;

    protected $table  = 'leads';

    protected $fillable = [
        'business_name',
        'business_sector',
        'address',
        'pic_name',
        'pic_contact_number',
        'client_indicator',
        'lead_status',
    ];
    
}
