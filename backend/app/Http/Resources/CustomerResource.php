<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'born_at' => Carbon::parse($this->born_at)->format('Y-m-d'),
            'state_id' => $this->state_id,
            'state_name' => $this->state->name,
            'city_id' => $this->city_id,
            'city_name' => $this->city->name,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s')
        ];
    }
}
