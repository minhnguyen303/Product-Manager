<?php


class ProductManager
{
    private $allProducts = [];

    public function listProduct()
    {
        return $this->allProducts;
    }

    public function add($product)
    {
        array_push($this->allProducts, $product);
    }

    public function delete($index)
    {
        unset($this->allProducts[$index]);
    }

    public function update($index, $product)
    {
        $this->allProducts[$index] = $product;
    }

    public function get($index)
    {
        return $this->allProducts[$index];
    }

}