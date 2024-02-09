<?php

namespace Orvital\Core\Foundation;

use Illuminate\Foundation\Application as BaseApplication;
use Orvital\Core\Foundation\Configuration\ApplicationBuilder;

class Application extends BaseApplication
{
    public function __construct($basePath = null)
    {
        parent::__construct($basePath);

        $this->overrideCoreContainerAliases();
    }

    protected function overrideCoreContainerAliases()
    {
        $replacements = [
            \Illuminate\Foundation\Application::class => self::class,
        ];

        $aliases = array_keys($this->aliases);

        foreach ($replacements as $key => $value) {
            if ($alias = $this->aliases[$key] ?? false) {
                $this->abstractAliases[$alias][array_search($key, $this->abstractAliases[$alias])] = $value;

                $aliases[array_search($key, $aliases)] = $value;
            }
        }

        $this->aliases = array_combine($aliases, $this->aliases);
    }

    /**
     * @return \Orvital\Core\Foundation\Configuration\ApplicationBuilder
     */
    public static function configure(string $basePath = null)
    {
        $basePath = match (true) {
            is_string($basePath) => $basePath,
            default => static::inferBasePath(),
        };

        return (new ApplicationBuilder(new static($basePath)))
            ->withKernels()
            ->withEvents()
            ->withCommands();
    }
}
