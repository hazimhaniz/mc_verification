<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mc extends Model
{
    public $table = 'mc';
    protected $primaryKey = 'mc_id';
    public $timestamps = false;

    public function doctor(){

        return $this->belongsTo(doctor::class, 'doctor_id', 'doctor_id');
    }
}
