<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job_posts extends Model
{
    use HasFactory; 
    use SoftDeletes; // Enables soft delete functionality

    protected $table = 'jobs_posts';

    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'employment_type',
        'salary_range',
        'is_active',
       'published_at',
    ];

    // Dates you want to treat as Carbon instances (includes deleted_at for soft deletes)
    protected $dates = ['deleted_at', 'published_at'];
}
