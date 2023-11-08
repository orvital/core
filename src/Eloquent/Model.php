<?php

namespace Orvital\Core\Eloquent;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
 *
 * @property-read string $id
 */
abstract class Model extends BaseModel
{
    use HasFactory;
    use HasUlids;

    protected $keyType = 'string';

    public $incrementing = false;

    public function newUniqueId()
    {
        return (string) Str::ulid();
    }

    /**
     * @param  \Carbon\CarbonImmutable  $date
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->toIso8601ZuluString();
    }

    /**
     * Get the model class alias associated with the morph map.
     */
    public static function getAlias(): string
    {
        return in_array(static::class, Relation::$morphMap)
            ? array_search(static::class, Relation::$morphMap, true)
            : Str::snake(class_basename(static::class));
    }

    public function getMorphClass()
    {
        return static::getAlias();
    }
}
