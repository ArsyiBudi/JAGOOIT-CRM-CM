<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class M_Talents extends Model
{
    use HasFactory;

    protected $table = 'talents';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'domicile',
        'pob_talent',
        'dob_talent',
        'age',
        'gender',
        'religion',
        'image',
        'level',
        'phone_number',
        'email',
        'signature',
        'status_onboard',
        'is_active',
    ];

    public function lead() : BelongsTo
    {
        return $this->belongsTo(M_Orders::class);
    }

    public function order_detail() : BelongsTo
    {
        return $this->belongsTo(M_OrderDetails::class);
    }

    public function posisiTalent() : HasOne
    {
        return $this -> hasOne(M_TalentDetails::class, 'id_talent')
        ->where('id_talent_details', '=', '1');
    }
    public function keterampilanTalent() : HasOne
    {
        return $this -> hasOne(M_TalentDetails::class, 'id_talent')
        ->where('id_talent_details', '=', '4');
    }
    public function pendidikanTalent() : HasOne
    {
        return $this -> hasOne(M_TalentDetails::class, 'id_talent')
        ->where('id_talent_details', '=', '5');
    }
}
