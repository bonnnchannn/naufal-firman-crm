<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['lead_id', 'user_id', 'status', 'notes'];

    // Relasi ke model User (Sales)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Lead
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}