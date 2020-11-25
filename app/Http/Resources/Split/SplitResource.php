<?php

namespace App\Http\Resources\Split;

use Illuminate\Http\Resources\Json\JsonResource;

class SplitResource extends JsonResource
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
            'Z' => $this->Z,
            'total' => $this->total,
            'total_corresponsal' => $this->total_corresponsal,
            'total_pesos_cash' => $this->total_pesos_cash,
            'total_pesos_credit' => $this->total_pesos_credit,
            'total_pesos_debit' => $this->total_pesos_debit,
            'total_pesos_card' => $this->total_pesos_card,
            'comments' => $this->comments,
            'income_id' => $this->income_id,
            /* 'procedure' => new ProcedureResource($this->whenLoaded('procedure')),
    'patient' => new PatientResource($this->whenLoaded('patient')),
    'doctors' => DoctorResource::collection($this->whenLoaded('doctors')), */
        ];
    }
}