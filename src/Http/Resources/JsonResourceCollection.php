<?php

namespace Orvital\Core\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection as BaseJsonResourceCollection;

class JsonResourceCollection extends BaseJsonResourceCollection
{
    public function toArray(Request $request)
    {
        return parent::toArray($request);
    }
}
