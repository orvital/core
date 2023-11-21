# Core
Core package.

## Service Container

### Typed Container Resolver

Use the `makeAs` method to resolve from the container a class instance of a specific type.

```php
makeAs(string $abstract, array $parameters = [], string $expected = null): mixed
```

#### Usage

If you bound an object to its class-string
```php
$typed = app()->makeAs(Bound::class);
```

Of course, you can pass in parameters
```php
$typed = app()->makeAs(Bound::class, []);
```

If you bound an object with a magic string
```php
$typed = app()->makeAs('magic-string', [], Bound::class);
```

## Eloquent

### Date Serialization

```php
/**
 * Prepare a date for array / JSON serialization.
 * 
 * toIso8601ZuluString()        2019-02-01T03:45:27Z
 * toDateTimeLocalString()      2019-02-01T03:45:27
 * toRfc822String()             Fri, 01 Feb 19 03:45:27 +0000
 * toRfc850String()             Friday, 01-Feb-19 03:45:27 UTC
 * toRfc1036String()            Fri, 01 Feb 19 03:45:27 +0000
 * toRfc1123String()            Fri, 01 Feb 2019 03:45:27 +0000
 * toRfc2822String()            Fri, 01 Feb 2019 03:45:27 +0000
 * toRfc3339String()            2019-02-01T03:45:27+00:00
 * toRfc7231String()            Fri, 01 Feb 2019 03:45:27 GMT
 * toRssString()                Fri, 01 Feb 2019 03:45:27 +0000
 * toW3cString()                2019-02-01T03:45:27+00:00
 */
protected function serializeDate(DateTimeInterface $date): string
{
    return $date->toIso8601ZuluString();
}
```