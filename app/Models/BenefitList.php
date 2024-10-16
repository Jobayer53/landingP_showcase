<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitList extends Model
{
    use HasFactory;
    protected $fillable = [
        'landing_page_id',
        'list'
    ];
}
