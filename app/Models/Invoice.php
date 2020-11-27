<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public $fillable = [
        'income_id',
        'currency',
        'comments',
        'amount',
        'type',
        'payment',
        'number',
    ];

    public function income()
    {
        return $this->belongsTo('App\Models\Income');
    }

    public function currency()
    {
        switch ($this->currency) {
            case 0:
                return 'Pesos';

                break;
            case 1:
                return 'Dólares';

                break;
            default:
                // code...
                break;
        }
    }

    public function type()
    {
        switch ($this->type) {
            case 0:
                return 'Consulta';

                break;
            case 1:
                return 'Farmacia';

                break;
            default:
                // code...
                break;
        }
    }

    public function payment()
    {
        switch ($this->payment) {
            case 0:
                return 'Efectivo';

                break;
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
