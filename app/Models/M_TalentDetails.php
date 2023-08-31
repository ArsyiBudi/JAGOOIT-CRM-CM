<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_TalentDetails extends Model
{
    use HasFactory;

    protected $table = 'talent_details';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_talent',
        'id_talent_details',
        'description'
    ];

    public function talents()
    {
        return $this -> belongsTo(M_Talents::class);
    }

}
