<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{

    public $table = 'doctor';
    protected $primaryKey = 'doctor_id';
    public $timestamps = false;

    public $fillable = [
        'doctor_id',
        'doctor_loginid',
        'doctor_password',
        'doctor_name',
        'doctor_ic',
        'doctor_email',
        'doctor_hpno',
        'doctor_position',
        'doctor_departmentname',
        'doctor_reg_date',
        'admin_id',
    ];
}
