<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_task extends Model
{
    protected $table = 'tbl_task';
    protected $primaryKey ='task_id';    
    protected $fillable = ['task_status','task_name','task_category','task_owner'];
}
