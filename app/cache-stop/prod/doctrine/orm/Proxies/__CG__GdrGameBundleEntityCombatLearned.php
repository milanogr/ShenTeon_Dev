<?php

namespace Proxies\__CG__\Gdr\GameBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CombatLearned extends \Gdr\GameBundle\Entity\CombatLearned implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'id', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'personage', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'combatSet', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'setLevel', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'levelDescription'];
        }

        return ['__isInitialized__', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'id', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'personage', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'combatSet', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'setLevel', '' . "\0" . 'Gdr\\GameBundle\\Entity\\CombatLearned' . "\0" . 'levelDescription'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CombatLearned $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPersonage($personage)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPersonage', [$personage]);

        return parent::setPersonage($personage);
    }

    /**
     * {@inheritDoc}
     */
    public function getPersonage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPersonage', []);

        return parent::getPersonage();
    }

    /**
     * {@inheritDoc}
     */
    public function setCombatSet($combatSet)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCombatSet', [$combatSet]);

        return parent::setCombatSet($combatSet);
    }

    /**
     * {@inheritDoc}
     */
    public function getCombatSet()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCombatSet', []);

        return parent::getCombatSet();
    }

    /**
     * {@inheritDoc}
     */
    public function setSetLevel($setLevel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSetLevel', [$setLevel]);

        return parent::setSetLevel($setLevel);
    }

    /**
     * {@inheritDoc}
     */
    public function getSetLevel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSetLevel', []);

        return parent::getSetLevel();
    }

    /**
     * {@inheritDoc}
     */
    public function getLevelDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLevelDescription', []);

        return parent::getLevelDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setLevelDescription($levelDescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLevelDescription', [$levelDescription]);

        return parent::setLevelDescription($levelDescription);
    }

}
