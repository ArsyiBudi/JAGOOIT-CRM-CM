<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use iluminate\Database\Eloquent\Models;

class M_Popks extends Model
{
    use HasFactory;

    protected $table = 'popks_letter';

    protected $fillable = [
        'letter_numbers', 
        'leads_id', 
        'employee_name',
        'employee_position',
        'employee_address',
        'client_name',
        'client_position',
        'client_address',
        'start_date',
        'end_date',
        'nominal_fees',
        'included_fees',
        'weekday_cost',
        'weekend_cost',
        'notes',
        'consumption_cost',
        'transportation_cost',
        'billing_due_date',
        'billing_days',
        'authorized_by',
        'account_number',
        'bank_name',
        'account_manager_provider',
        'provider_finance_administrator',
        'jagoit_director',
        'client_director',
    ];    
}