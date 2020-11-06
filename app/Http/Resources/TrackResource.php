<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrackResource extends JsonResource
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
            "id" => $this->id,
            "release_id" => $this->release_id,
            "name" => $this->name,
            "artist_name" => $this->artist_name,
            "artist_features" =>$this->artist_features,
            "description" => $this->description,
            "bpm" => $this->bpm
        ];
    }
}
