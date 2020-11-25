<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;
    public $fillable = [
        'income_id',
        'card_number',
        'description',
        'amount',
        'type',
        'process_date_time',
    ];

    public function income()
    {
        return $this->belongsTo('App\Models\Income');
    }

    public function type()
    {
        switch ($this->type) {
            case 1:
                return 'Tarjeta crédito';

                break;
            case 2:
                return 'Tarjeta débito';

                break;
            default:
                // code...
                break;
        }
    }
}