<?php
/**
	* Collection d'objet Contact
*/

class CollectionContact
{

    private $itemsContact = array(Contact::class);

    public function addContact($obj, $key = null)
    {
        if ($key == null) {
            $this->itemsContact[] = $obj;
        } else {
            if (isset($this->itemsContact[$key])) {
                throw new UnexpectedValueException ("Key $key already in use.");
            } else {
                $this->itemsContact[$key] = $obj;
            }
        }
    }

    public function deleteContact($key){
        if (isset($this->itemsContact[$key])) {
            unset($this->itemsContact[$key]);
        }
        else {
            throw new UnexpectedValueException ("Invalid key $key.");
        }
    }

    public function getTelephone($key){

    }

}