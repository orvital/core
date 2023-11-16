<?php

namespace Orvital\Core\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource as BaseJsonResource;

class JsonResource extends BaseJsonResource
{
    public function toArray(Request $request)
    {
        return parent::toArray($request);
    }
}
