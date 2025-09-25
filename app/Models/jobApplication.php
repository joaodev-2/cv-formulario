<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'name','email','phone','desired_role','education','linkedin_url','cv_path','ip','submitted_at'
    ];
    protected $casts = ['submitted_at'=>'datetime'];
}