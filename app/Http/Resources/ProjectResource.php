<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'id'                => $this->id,
            'project_name'      => $this->project_name,
            'project_url'       => $this->project_url,
            'created_at'        => date('d-m-Y H:i:s', strtotime($this->created_at)),
            'updated_at'        => date('d-m-Y H:i:s', strtotime($this->updated_at))
        ];
    }
}
