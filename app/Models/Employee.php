<?php

namespace App\Models;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table ='employees';
    protected $fillable=[
        'country_id',
        'state_id',
        'city_id',
        'department_id',
        'first_name',
        'last_name',
        'address',
        'zip_code',
        'date_of_birth',
        'date_hired'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
