<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'meta' => [
                'version' => '1.0',
                'author' => 'Kiran Bhattarai',
                'website' => 'https://kiranbhattarai.me',
            ],
        ];
    }

}
