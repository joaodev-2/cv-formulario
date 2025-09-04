<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'name','email','phone','desired_role','education','notes','cv_path','ip','submitted_at'
    ];
    protected $casts = ['submitted_at'=>'datetime'];
}