<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_person extends Model
{
    protected $table = 'tbl_person';
    protected $primaryKey ='person_id';    
    protected $fillable = ['person_image','person_username','person_password', 'person_gender','person_email','person_number';
}



