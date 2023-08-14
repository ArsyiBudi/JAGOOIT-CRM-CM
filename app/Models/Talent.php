<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model{
    public $table = 'talents';

    protected $fillable = [
        'name',
    ];
}

?>