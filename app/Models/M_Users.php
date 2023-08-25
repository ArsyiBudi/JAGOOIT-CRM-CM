<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class M_Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_type_Id',
        'username',
        'password',
        'token',
        'email',
        'xs1'
    ];

    public function userTypes() : BelongsTo
    {
        return $this->belongsTo(M_UserTypes::class, 'user_type_id', 'id');
    }
}
