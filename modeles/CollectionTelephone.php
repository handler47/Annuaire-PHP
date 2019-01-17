<?php
/**
	* Collection d'objet Telephone
*/

class CollectionTelephone
{

    private $itemsTelephone = array(Telephone::class);

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

}