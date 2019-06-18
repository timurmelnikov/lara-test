<?php


namespace App\DesignPatterns\Fundamental\PropertyContainer;


use App\DesignPatterns\Fundamental\PropertyContainer\Interfaces\PropertyContainerInterface;

class PropertyContainer implements  PropertyContainerInterface
{

    /**
     * @var array
     */
    private $propertyContainer = [];

    public static function getDescription(){
        return 'Описание контейнера свойств';

    }

    /**
     * @param $propertyName
     * @param $value
     * @return mixed
     */
    function addProperty($propertyName, $value)
    {
        $this->propertyContainer[$propertyName]=$value;
    }

    /**
     * @param $propertyName
     * @return mixed
     */
    function deleteProperty($propertyName)
    {
        unset($this->propertyContainer[$propertyName]);
    }

    /**
     * @param $propertyName
     * @return mixed
     */
    function getProperty($propertyName)
    {
        return $this->propertyContainer[$propertyName] ?? null;
    }

    /**
     * @param $propertyName
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    function setProperty($propertyName, $value)
    {
        if(!isset($this->propertyContainer[$propertyName])){
            throw new \Exception("Property [{$propertyName}] not found");
        }

        $this->propertyContainer[$propertyName] = $value;
    }
}