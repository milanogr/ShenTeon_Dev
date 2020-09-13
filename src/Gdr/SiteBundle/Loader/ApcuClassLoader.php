<?php

namespace Gdr\SiteBundle\Loader;

class ApcuClassLoader
{
    private $prefix;

    /**
     * A class loader object that implements the findFile() method.
     *
     * @var object
     */
    protected $decorated;

    /**
     * @var bool
     */
    protected $isApcu = false;

    /**
     * Constructor.
     *
     * @param string $prefix    The APC namespace prefix to use.
     * @param object $decorated A class loader object that implements the findFile() method.
     *
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function __construct($prefix, $decorated)
    {
        if (!extension_loaded('apcu') && !extension_loaded('apc')) {
            throw new \RuntimeException('Unable to use ApcuClassLoader as APCu or APC are not enabled.');
        }

        if (!method_exists($decorated, 'findFile')) {
            throw new \InvalidArgumentException('The class finder must implement a "findFile" method.');
        }

        $this->prefix = $prefix;
        $this->decorated = $decorated;
        $this->isApcu = extension_loaded('apcu');
    }

    /**
     * Registers this instance as an autoloader.
     *
     * @param bool $prepend Whether to prepend the autoloader or not
     */
    public function register($prepend = false)
    {
        spl_autoload_register(array($this, 'loadClass'), true, $prepend);
    }

    /**
     * Unregisters this instance as an autoloader.
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    /**
     * Loads the given class or interface.
     *
     * @param string $class The name of the class
     *
     * @return bool|null True, if loaded
     */
    public function loadClass($class)
    {
        if ($file = $this->findFile($class)) {
            require $file;

            return true;
        }
    }

    /**
     * @param string $class A class name to resolve to file
     * @return string|null
     */
    public function findFile($class)
    {
        if($this->isApcu){
            if (false === $file = apcu_fetch($this->prefix.$class)) {
                apcu_store($this->prefix.$class, $file = $this->decorated->findFile($class));
            }
        } else {
            if (false === $file = apc_fetch($this->prefix.$class)) {
                apc_store($this->prefix.$class, $file = $this->decorated->findFile($class));
            }
        }

        return $file;
    }

    /**
     * Passes through all unknown calls onto the decorated object.
     */
    public function __call($method, $args)
    {
        return call_user_func_array(array($this->decorated, $method), $args);
    }
}