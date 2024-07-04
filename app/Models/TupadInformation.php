<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TupadEmployee;

class TupadInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tupadEmployee()
    {
        return $this->hasMany(TupadEmployee::class);
    }
}
