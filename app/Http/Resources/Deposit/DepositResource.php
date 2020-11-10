<?php

namespace App\Http\Resources\Deposit;

use Illuminate\Http\Resources\Json\JsonResource;

class DepositResource extends JsonResource
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
            'total' => $this->total,
            'total_pesos' => $this->total_pesos,
            'total_dollars' => $this->total_dollars,
            'comments' => $this->comments,
            'type' => $this->type(),
            'type2' => $this->type,
            'date' => $this->date->format('M-d-Y'),
            'date2' => $this->date->format('Y-m-d'),
            'date_from' => $this->date->format('M-d-Y'),
            'date_from2' => $this->date->format('Y-m-d'),
            'date_to' => $this->date->format('M-d-Y'),
            'date_to2' => $this->date->format('Y-m-d'),
            /* 'procedure' => new ProcedureResource($this->whenLoaded('procedure')),
    'patient' => new PatientResource($this->whenLoaded('patient')),
    'doctors' => DoctorResource::collection($this->whenLoaded('doctors')), */
        ];
    }
}