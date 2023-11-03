<?php

namespace Orvital\Core\Eloquent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Str;
use DateTimeInterface;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @property-read string $id
 */
abstract class Model extends BaseModel
{
    use HasUlids;
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    public function newUniqueId(): array
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
