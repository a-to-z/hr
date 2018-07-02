<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    //
    protected $table = 'employee_mst';
    protected $connection = 'oracle';
    protected $primaryKey = 'emp_no';

}
