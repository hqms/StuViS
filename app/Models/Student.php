<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'class',
        'parent_id',
    ];

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }

    public function parent()
    {
        return $this->belongsTo(Parents::class);
    }
}