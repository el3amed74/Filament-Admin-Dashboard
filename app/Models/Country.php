<?php

namespace App\Models;

use App\Models\State;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $table ='countries';
    protected $fillable=[
        'name',
        'code',
        'phonecode'

    ];

    public function State(){
        return $this->hasMany(State::class);
    }
    public function employees() : HasMany{
        return $this->hasMany(Employee::class);
    }
}
