<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    public $fillable = [
        'exchange_rate',
        'date',
        'year',
        'month',
        'comments',
        'total',
        'total_corresponsal',
        'total_pesos_cash',
        'total_pesos_credit',
        'total_pesos_debit',
        'total_pesos_card',
        'total_pesos',
        'total_pesos_USD',
    ];

    protected $dates = ['date', 'created_at', 'updated_at'];

    public function splits()
    {
        return $this->hasMany('App\Models\Split');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }
}