<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Split extends Model
{
    use HasFactory;
    public $fillable = [
        'income_id',
        'Z',
        'comments',
        'total',
        'total_corresponsal',
        'total_pesos_cash',
        'total_pesos_credit',
        'total_pesos_debit',
        'total_pesos_card',
    ];

    public function income()
    {
        return $this->belongsTo('App\Models\Income');
    }
}