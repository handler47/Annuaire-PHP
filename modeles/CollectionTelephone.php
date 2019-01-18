<?php
/**
	* Collection d'objet Telephone
*/
namespace ArrayObject;
use http\Exception\UnexpectedValueException;

class CollectionTelephone
{

    public function addTelephone($obj, $key = null)
    {
        if ($key == null) {
            $this->itemsTelephone[] = $obj;
        } else {
            if (isset($this->itemsTelephone[$key])) {
                throw new UnexpectedValueException ("Key $key already in use.");
            } else {
                $this->itemsTelephone[$key] = $obj;
            }
        }
    }

    public function deleteTelephone($key){
        if (isset($this->itemsTelephone[$key])) {
            unset($this->itemsTelephone[$key]);
    }
        else {
            throw new UnexpectedValueException ("Invalid key $key.");
        }
    }

    public function getTelephones(){
        return $this->itemsTelephone;
    }

    public function getTelephone($key){
        if ($key != null){
            if (isset($this->itemsTelephone[$key])) {
                return $this->itemsTelephone[$key];
            }
        }
        else {
            throw new UnexpectedValueException ("You didn't entered key");
        }
    }

}