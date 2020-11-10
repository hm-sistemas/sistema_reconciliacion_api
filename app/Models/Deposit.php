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
        'total_dollars',
        'pending',
        'type',
    ];

    protected $dates = ['date', 'date_from', 'date_to', 'created_at', 'updated_at'];

    public function type()
    {
        switch ($this->type) {
            case 0:
                return 'Electrónico';

                break;
            case 1:
                return 'Efectivo';

                break;
            default:
                // code...
                break;
        }
    }

    public function dates()
    {
        return '';
    }
}