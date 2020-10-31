<?php
class Order
{
    private $id;
    private $date;
    private $address_id;
    private $user_id;
    
    public function __construct($id, $date, $address_id, $user_id)
    {
        $this->id = $id;
        $this->date = $date;
        $this->address_id = $address_id;
        $this->user_id = $user_id;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getAddress_id()
    {
        return $this->address_id;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $address_id
     */
    public function setAddress_id($address_id)
    {
        $this->address_id = $address_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
}
?>