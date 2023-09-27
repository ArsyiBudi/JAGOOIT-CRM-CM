<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class M_Users extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_type_id',
        'username',
        'password',
        'token',
        'email',
        'xs1'
    ];

    public $timestamps = false;

    //?Eloquent Relationship
    public function userTypes() : BelongsTo
    {
        return $this->belongsTo(M_UserTypes::class, 'user_type_id', 'id');
    }


    //!IGNORE THIS, FOR AUTHENTHICATE
    public function getAuthIdentifierName()
    {
        return 'id'; // Replace with your primary key column name
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
