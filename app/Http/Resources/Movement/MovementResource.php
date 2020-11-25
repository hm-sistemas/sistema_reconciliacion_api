<?php

namespace App\Http\Resources\Movement;

use Illuminate\Http\Resources\Json\JsonResource;

class MovementResource extends JsonResource
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
            'type' => $this->type(),
            'type2' => $this->type,
            'card_number' => $this->card_number,
            'description' => $this->description,
            'process_date_time' => $this->process_date_time,
            'income_id' => $this->income_id,
        ];
    }
}