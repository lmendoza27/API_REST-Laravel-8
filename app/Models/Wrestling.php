<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wrestling extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'power','image','company'
      ];
}
