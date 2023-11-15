<?php

namespace Orvital\Core\Database\Eloquent\Relations;

use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;
use Orvital\Core\Database\Eloquent\Model;

class Pivot extends Model
{
    use AsPivot;

    protected $guarded = [];
}
