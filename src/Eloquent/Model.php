<?php

namespace Orvital\Core\Eloquent;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @property-read string $id
 */
abstract class Model extends BaseModel
{
    use HasFactory;
    use HasUlids;

    protected $keyType = 'string';

    public $incrementing = false;

    public function newUniqueId(): string
    {
        return (string) Str::ulid();
    }

    /**
     * @param  \Carbon\CarbonImmutable  $date
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->toIso8601ZuluString();
    }
}
