<?php

namespace App\Http\Resources\Invoice;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'amount' => $this->amount,
            'comments' => $this->comments,
            'type' => $this->type(),
            'currency' => $this->currency(),
            'payment' => $this->payment(),
            'type2' => $this->type,
            'currency2' => $this->currency,
            'payment2' => $this->payment,
            'number' => $this->number,
            /* 'procedure' => new ProcedureResource($this->whenLoaded('procedure')),
    'patient' => new PatientResource($this->whenLoaded('patient')),
    'doctors' => DoctorResource::collection($this->whenLoaded('doctors')), */
        ];
    }
}
