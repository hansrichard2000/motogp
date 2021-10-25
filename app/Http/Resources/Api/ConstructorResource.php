<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ConstructorResource extends JsonResource
{
    /**
     * @var mixed
     */

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
            'description' => $this->description,
            'nation' => $this->nation,
            'engine' => $this->engine,
            'logo' => $this->logo,
            'created_by' => $this->creator->name,
            'updated_by' => $this->updater ? $this->updater->name : '-',
        ];
    }
}
