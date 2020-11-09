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
            'exchange_rate' => $this->exchange_rate,
            'total_corresponsal' => $this->total_corresponsal,
            'total_pesos_cash' => $this->total_pesos_cash,
            'total_pesos_credit' => $this->total_pesos_credit,
            'total_pesos_debit' => $this->total_pesos_debit,
            'total_pesos_card' => $this->total_pesos_card,
            'total_pesos' => $this->total_pesos,
            'total_pesos_USD' => $this->total_pesos_USD,
            'comments' => $this->comments,
            'date' => $this->date->format('M-d-Y'),
            'date2' => $this->date->format('Y-m-d'),
            /* 'procedure' => new ProcedureResource($this->whenLoaded('procedure')),
    'patient' => new PatientResource($this->whenLoaded('patient')),
    'doctors' => DoctorResource::collection($this->whenLoaded('doctors')), */
        ];
    }
}