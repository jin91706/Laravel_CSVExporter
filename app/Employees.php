<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
	protected $table = 'employees';
    // Set primary key
    protected $primaryKey = 'emp_no';
    // Set false to stop Eloquent timestamp management
    public $timestamps = false;


    public function salaries() {


    	return $this->hasMany('App\Salaries', 'emp_no')->orderBy('salary', 'desc');
    }
}
