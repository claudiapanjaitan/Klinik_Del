<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = "Konsultasi";
    protected $guarded = ['id'];
    // protected $fillable = ['id', 'users_id', 'nama', 'nim', 'keluhan', 'tanggal_konsultasi','status', ''];
}
