<?php

namespace App\Models;

use App\Models\State;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $table ='cities';
    protected $fillable=[
        'state_id',
        'name'
    ];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function employees() : HasMany{
        return $this->hasMany(Employee::class);
    }
}
