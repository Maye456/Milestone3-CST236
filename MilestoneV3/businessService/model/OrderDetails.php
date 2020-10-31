<?php
class OrderDetails
{
    private $id;
    private $currentPrice;
    private $currentDescription;
    private $order_id;
    private $product_id;
    private $quantity;
    
    public function __construct($id, $currentPrice, $currentDescription, $order_id, $product_id, $quantity)
    {
        $this->id = $id;
        $this->currentPrice = $currentPrice;
        $this->currentDescription = $currentDescription;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
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
    public function getCurrentPrice()
    {
        return $this->currentPrice;
    }

    /**
     * @return mixed
     */
    public function getCurrentDescription()
    {
        return $this->currentDescription;
    }

    /**
     * @return mixed
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * @return mixed
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $currentPrice
     */
    public function setCurrentPrice($currentPrice)
    {
        $this->currentPrice = $currentPrice;
    }

    /**
     * @param mixed $currentDescription
     */
    public function setCurrentDescription($currentDescription)
    {
        $this->currentDescription = $currentDescription;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
?>