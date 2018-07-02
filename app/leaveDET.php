<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaveDET extends Model
{
    //
    protected $table = 'leave_det';
    protected $connection = 'oracle';
    protected $primaryKey = 's_no';
}
