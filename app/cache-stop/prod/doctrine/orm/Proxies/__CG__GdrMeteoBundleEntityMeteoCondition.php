<?php

namespace Proxies\__CG__\Gdr\MeteoBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class MeteoCondition extends \Gdr\MeteoBundle\Entity\MeteoCondition implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'id', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'name', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'combinations', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'starts', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'ends', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'status', 'image', 'imageName', 'imageNight', 'imageNameNight', 'updatedAt'];
        }

        return ['__isInitialized__', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'id', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'name', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'combinations', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'starts', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'ends', '' . "\0" . 'Gdr\\MeteoBundle\\Entity\\MeteoCondition' . "\0" . 'status', 'image', 'imageName', 'imageNight', 'imageNameNight', 'updatedAt'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (MeteoCondition $proxy) {
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
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function addCombination(\Gdr\MeteoBundle\Entity\MeteoCombination $combinations)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCombination', [$combinations]);

        return parent::addCombination($combinations);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCombination(\Gdr\MeteoBundle\Entity\MeteoCombination $combinations)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCombination', [$combinations]);

        return parent::removeCombination($combinations);
    }

    /**
     * {@inheritDoc}
     */
    public function getCombinations()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCombinations', []);

        return parent::getCombinations();
    }

    /**
     * {@inheritDoc}
     */
    public function addStart(\Gdr\MeteoBundle\Entity\MeteoMessage $starts)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addStart', [$starts]);

        return parent::addStart($starts);
    }

    /**
     * {@inheritDoc}
     */
    public function removeStart(\Gdr\MeteoBundle\Entity\MeteoMessage $starts)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeStart', [$starts]);

        return parent::removeStart($starts);
    }

    /**
     * {@inheritDoc}
     */
    public function getStarts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStarts', []);

        return parent::getStarts();
    }

    /**
     * {@inheritDoc}
     */
    public function addEnd(\Gdr\MeteoBundle\Entity\MeteoMessage $ends)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addEnd', [$ends]);

        return parent::addEnd($ends);
    }

    /**
     * {@inheritDoc}
     */
    public function removeEnd(\Gdr\MeteoBundle\Entity\MeteoMessage $ends)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeEnd', [$ends]);

        return parent::removeEnd($ends);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnds()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnds', []);

        return parent::getEnds();
    }

    /**
     * {@inheritDoc}
     */
    public function addStatu(\Gdr\MeteoBundle\Entity\MeteoStatus $status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addStatu', [$status]);

        return parent::addStatu($status);
    }

    /**
     * {@inheritDoc}
     */
    public function removeStatu(\Gdr\MeteoBundle\Entity\MeteoStatus $status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeStatu', [$status]);

        return parent::removeStatu($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function getImage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImage', []);

        return parent::getImage();
    }

    /**
     * {@inheritDoc}
     */
    public function setImage($image)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImage', [$image]);

        return parent::setImage($image);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageName', []);

        return parent::getImageName();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageName($imageName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageName', [$imageName]);

        return parent::setImageName($imageName);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageNight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageNight', []);

        return parent::getImageNight();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageNight($imageNight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageNight', [$imageNight]);

        return parent::setImageNight($imageNight);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageNameNight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageNameNight', []);

        return parent::getImageNameNight();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageNameNight($imageNameNight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageNameNight', [$imageNameNight]);

        return parent::setImageNameNight($imageNameNight);
    }

}
