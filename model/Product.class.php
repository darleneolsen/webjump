<?php

class Product {
	private	$skuProduct;
    private $nameProduct;
	private $priceProduct;
    private $quantityProduct;
	private $categoriesProduct = array();
	private $descriptionProduct;
    
    function __construct($skuProduct, $nameProduct,$priceProduct, $quantityProduct, $categoriesProduct,$descriptionProduct) {
        $this->skuProduct 			= $skuProduct;
		$this->nameProduct 			= $nameProduct;
		$this->priceProduct 		= $priceProduct;
        $this->quantityProduct 		= $quantityProduct;
		$this->categoriesProduct 	= $categoriesProduct;
		$this->descriptionProduct 	= $descriptionProduct;

    }
	
    public function getSkuProduct() {
        return $this->skuProduct;
    }    
    public function getNameProduct() {
        return $this->nameProduct;
    }
	
    public function getPriceProduct() {
        return $this->priceProduct;
    }	

    public function getQuantityProduct() {
        return $this->quantityProduct;
    }

    public function getCategoriesProduct() {
        return $this->categoriesProduct;
    }

    public function getDescriptionProduct() {
        return $this->descriptionProduct;
    }
	
    public function setSkuProduct($skuProduct) {
        $this->skuProduct = $skuProduct;
    }
	
    public function setNameProduct($nameProduct) {
        $this->nameProduct = $nameProduct;
    }
	
    public function setPriceProduct($priceProduct) {
        $this->priceProduct = $priceProduct;
    }	

    public function setQuantityProduct($quantityProduct) {
        $this->quantityProduct = $quantityProduct;
    }	

    public function setQCategoriesProduct($categoriesProduct) {
        $this->categoriesProduct = $categoriesProduct;
    }

    public function setDescriptionProduct($descriptionProduct) {
        $this->descriptionProduct = $descriptionProduct;
    }	
}
