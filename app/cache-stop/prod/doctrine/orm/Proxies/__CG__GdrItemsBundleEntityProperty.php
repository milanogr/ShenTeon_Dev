<?php

namespace Proxies\__CG__\Gdr\ItemsBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Property extends \Gdr\ItemsBundle\Entity\Property implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'id', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'type', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'name', 'image', 'chatImage', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'chatImageName', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'description', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'imageName', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'price', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'tax', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'frequencyItems', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'nextProductionAt', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'nextTaxAt', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'maxPeople', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'isActive', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'owner', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'createdAt', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'updatedAt', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'isTaxNotified'];
        }

        return ['__isInitialized__', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'id', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'type', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'name', 'image', 'chatImage', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'chatImageName', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'description', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'imageName', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'price', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'tax', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'frequencyItems', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'nextProductionAt', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'nextTaxAt', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'maxPeople', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'isActive', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'owner', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'createdAt', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'updatedAt', '' . "\0" . 'Gdr\\ItemsBundle\\Entity\\Property' . "\0" . 'isTaxNotified'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Property $proxy) {
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
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
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
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
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
    public function setType($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function getTypeName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTypeName', []);

        return parent::getTypeName();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', [$description]);

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', []);

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrice($price)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrice', [$price]);

        return parent::setPrice($price);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrice', []);

        return parent::getPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuantity($quantity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuantity', [$quantity]);

        return parent::setQuantity($quantity);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuantity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuantity', []);

        return parent::getQuantity();
    }

    /**
     * {@inheritDoc}
     */
    public function setTax($tax)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTax', [$tax]);

        return parent::setTax($tax);
    }

    /**
     * {@inheritDoc}
     */
    public function getTax()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTax', []);

        return parent::getTax();
    }

    /**
     * {@inheritDoc}
     */
    public function setFrequencyItems($frequencyItems)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFrequencyItems', [$frequencyItems]);

        return parent::setFrequencyItems($frequencyItems);
    }

    /**
     * {@inheritDoc}
     */
    public function getFrequencyItems()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFrequencyItems', []);

        return parent::getFrequencyItems();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive($isActive)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', [$isActive]);

        return parent::setIsActive($isActive);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsActive', []);

        return parent::getIsActive();
    }

    /**
     * {@inheritDoc}
     */
    public function getMaxPeople()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMaxPeople', []);

        return parent::getMaxPeople();
    }

    /**
     * {@inheritDoc}
     */
    public function setMaxPeople($maxPeople)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMaxPeople', [$maxPeople]);

        return parent::setMaxPeople($maxPeople);
    }

    /**
     * {@inheritDoc}
     */
    public function setOwner(\Gdr\UserBundle\Entity\Personage $owner = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOwner', [$owner]);

        return parent::setOwner($owner);
    }

    /**
     * {@inheritDoc}
     */
    public function getOwner()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOwner', []);

        return parent::getOwner();
    }

    /**
     * {@inheritDoc}
     */
    public function getNextProductionAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNextProductionAt', []);

        return parent::getNextProductionAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setNextProductionAt($nextProductionAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNextProductionAt', [$nextProductionAt]);

        return parent::setNextProductionAt($nextProductionAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getNextTaxAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNextTaxAt', []);

        return parent::getNextTaxAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setNextTaxAt($nextTaxAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNextTaxAt', [$nextTaxAt]);

        return parent::setNextTaxAt($nextTaxAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsTaxNotified()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsTaxNotified', []);

        return parent::getIsTaxNotified();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsTaxNotified($isTaxNotified)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsTaxNotified', [$isTaxNotified]);

        return parent::setIsTaxNotified($isTaxNotified);
    }

    /**
     * {@inheritDoc}
     */
    public function getChatImage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChatImage', []);

        return parent::getChatImage();
    }

    /**
     * {@inheritDoc}
     */
    public function setChatImage($chatImage)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChatImage', [$chatImage]);

        return parent::setChatImage($chatImage);
    }

    /**
     * {@inheritDoc}
     */
    public function setChatImageName($chatImageName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChatImageName', [$chatImageName]);

        return parent::setChatImageName($chatImageName);
    }

    /**
     * {@inheritDoc}
     */
    public function getChatImageName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChatImageName', []);

        return parent::getChatImageName();
    }

}
