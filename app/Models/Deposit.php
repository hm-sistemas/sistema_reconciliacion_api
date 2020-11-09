<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    public $fillable = [
        'date',
        'date_from',
        'date_to',
        'comments',
        'total',
        'total_pesos',
        'pending',
    ];

    protected $dates = ['date', 'date_from', 'date_to', 'created_at', 'updated_at'];

    public function dates()
    {
        return '';
    }
}