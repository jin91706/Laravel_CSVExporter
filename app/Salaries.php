<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    protected $table = 'salaries';
    // Set primary key
    protected $primaryKey = 'emp_no';
    // Set false to stop Eloquent timestamp management
    public $timestamps = false;
}
