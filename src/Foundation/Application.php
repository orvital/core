<?php

namespace Orvital\Core\Foundation;

use Illuminate\Foundation\Application as BaseApplication;

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
            \Illuminate\Auth\Passwords\PasswordBrokerManager::class => \Orvital\Core\Auth\Passwords\PasswordBrokerManager::class,
            \Illuminate\Auth\Passwords\PasswordBroker::class => \Orvital\Core\Auth\Passwords\PasswordBroker::class,
            \Illuminate\Session\SessionManager::class => \Orvital\Core\Session\SessionManager::class,
            \Illuminate\Session\Store::class => \Orvital\Core\Session\Store::class,
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
     * Get the container's instances.
     *
     * @return array
     */
    public function getInstances()
    {
        return $this->instances;
    }

    /**
     * Get the container's aliases.
     *
     * @return array
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * Get the container's abstract aliases.
     *
     * @return array
     */
    public function getAbstractAliases()
    {
        return $this->abstractAliases;
    }

    /**
     * Get the application's service providers.
     *
     * @return array
     */
    public function getServiceProviders()
    {
        return $this->serviceProviders;
    }
}
