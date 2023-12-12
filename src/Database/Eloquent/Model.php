<?php

namespace Orvital\Core\Database\Eloquent;

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
     * Get the default model alias.
     */
    public static function getAlias(): string
    {
        return Str::snake(class_basename(static::class));
    }

    /**
     * Get the model alias from the morph map or the default alias if not associated.
     */
    public static function getMorphAlias(): string
    {
        return in_array(static::class, Relation::$morphMap)
            ? array_search(static::class, Relation::$morphMap, true)
            : static::getAlias();
    }
}
