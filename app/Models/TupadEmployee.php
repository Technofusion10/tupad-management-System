<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TupadAnnouncement;
use App\Models\TupadInformation;

class TupadEmployee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tupadInformation()
    {
        return $this->hasMany(TupadInformation::class);
    }
}
