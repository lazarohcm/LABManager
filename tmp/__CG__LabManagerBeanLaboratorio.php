<?php

namespace DoctrineProxies\__CG__\LabManager\Bean;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Laboratorio extends \LabManager\Bean\Laboratorio implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = array();



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
            return array('__isInitialized__', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'id', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'nome', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'descricao', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'telefone', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'sigla', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'capa', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'membro', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'projeto', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'noticia');
        }

        return array('__isInitialized__', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'id', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'nome', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'descricao', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'telefone', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'sigla', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'capa', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'membro', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'projeto', '' . "\0" . 'LabManager\\Bean\\Laboratorio' . "\0" . 'noticia');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Laboratorio $proxy) {
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
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
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

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getNome()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNome', array());

        return parent::getNome();
    }

    /**
     * {@inheritDoc}
     */
    public function getDescricao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescricao', array());

        return parent::getDescricao();
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefone', array());

        return parent::getTelefone();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function setNome($nome)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNome', array($nome));

        return parent::setNome($nome);
    }

    /**
     * {@inheritDoc}
     */
    public function setDescricao($descricao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescricao', array($descricao));

        return parent::setDescricao($descricao);
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefone($telefone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefone', array($telefone));

        return parent::setTelefone($telefone);
    }

    /**
     * {@inheritDoc}
     */
    public function getSigla()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSigla', array());

        return parent::getSigla();
    }

    /**
     * {@inheritDoc}
     */
    public function setSigla($sigla)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSigla', array($sigla));

        return parent::setSigla($sigla);
    }

    /**
     * {@inheritDoc}
     */
    public function getMembro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMembro', array());

        return parent::getMembro();
    }

    /**
     * {@inheritDoc}
     */
    public function setMembro(\LabManager\Bean\Membro $membro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMembro', array($membro));

        return parent::setMembro($membro);
    }

    /**
     * {@inheritDoc}
     */
    public function getProjeto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProjeto', array());

        return parent::getProjeto();
    }

    /**
     * {@inheritDoc}
     */
    public function setProjeto(\LabManager\Bean\Projeto $projeto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProjeto', array($projeto));

        return parent::setProjeto($projeto);
    }

    /**
     * {@inheritDoc}
     */
    public function getCapa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCapa', array());

        return parent::getCapa();
    }

    /**
     * {@inheritDoc}
     */
    public function setCapa($capa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCapa', array($capa));

        return parent::setCapa($capa);
    }

    /**
     * {@inheritDoc}
     */
    public function getNoticia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNoticia', array());

        return parent::getNoticia();
    }

    /**
     * {@inheritDoc}
     */
    public function setNoticia(\Doctrine\Common\Collections\ArrayCollection $noticia)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNoticia', array($noticia));

        return parent::setNoticia($noticia);
    }

}
