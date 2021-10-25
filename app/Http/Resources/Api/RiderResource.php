<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class RiderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'number' => $this->number,
            'team' => $this->group->name,
            'engine' => $this->creatorEngine->engine,
            'nation' => $this->nation,
            'date' => $this->date,
            'place' => $this->place,
            'height' => $this->height,
            'weight' => $this->weight,
            'podiums' => $this->podiums,
            'wins' => $this->wins,
            'title' => $this->title,
            'description' => $this->description,
            'picture' => $this->picture,
            'flag' => $this->flag,
            'created_by' => $this->creator->name,
            'updated_by' => $this->updater ? $this->updater->name : '-',
        ];
    }
}
