<?php

namespace App\Http\Resources\Income;

use Illuminate\Http\Resources\Json\JsonResource;

class IncomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'year' => $this->year,
            'month' => $this->month,
            'total' => $this->total,
            'exchangeRate' => $this->exchange_rate,
            'totalCorresponsal' => $this->total_corresponsal,
            'totalPesosCash' => $this->total_pesos_cash,
            'totalPesosCredit' => $this->total_pesos_credit,
            'totalPesosDebit' => $this->total_pesos_debit,
            'totalPesosCard' => $this->total_pesos_card,
            'totalPesos' => $this->total_pesos,
            'totalPesosUSD' => $this->total_pesos_USD,
            'totalVoucher' => $this->total_voucher,
            'comments' => $this->comments,
            'date' => $this->date->format('M-d-Y'),
            'date2' => $this->date->format('Y-m-d'),
            /* 'procedure' => new ProcedureResource($this->whenLoaded('procedure')),
    'patient' => new PatientResource($this->whenLoaded('patient')),
    'doctors' => DoctorResource::collection($this->whenLoaded('doctors')), */
        ];
    }
}