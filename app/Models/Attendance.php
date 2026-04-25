<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    protected $fillable = [
        'staff_id',
        'attendance_date',
        'clock_in',
        'clock_out',
        'status'
    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'staff_id', 'id');
    }
}