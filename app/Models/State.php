<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    protected $table ='states';
    protected $fillable=[
        'country_id',
        'name'
    ];

    public function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }
    
    public function cities(): HasMany {
        return $this->hasMany(City::class);
    }
    public function employees() : HasMany{
        return $this->hasMany(Employee::class);
    }
}
