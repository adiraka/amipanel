<?php

namespace Amipanel;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'user_id', 'name', 'p_o_b', 'd_o_b', 'gender', 'religion', 'address', 'phone', 'position', 'photo'
    ];

    public function user()
    {
        return $this->belongsTo('Amipanel\User', 'user_id');
    }
}
