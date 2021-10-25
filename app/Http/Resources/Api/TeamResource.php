<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
//            'name' => $this->name,
            'principal' => $this->principal,
            'engine' => $this->constructor->engine,
            'entry' => $this->entry,
            'logo' => $this->logo,
            'bg_image' => $this->bg_image,
            'created_by' => $this->creator->name,
            'updated_by' => $this->updater ? $this->updater->name : '-',
        ];
    }
}
