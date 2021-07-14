<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    public $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    public $fillable = [
        'admin_id',
        'projek_id',
        'admin_name',
        'admin_ic',
        'admin_email',
        'admin_password',
        'admin_handphone',
        'admin_ic',
        'admin_reg_date',
        

    ];


}
