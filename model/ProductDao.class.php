<?php

require_once '../dao/Conexao.php';
require_once 'Product.class.php';

class ProductDao extends Conexao {

      public function insert(Product $product) {

		$sql_id = "SELECT Max(product_id)+1 as id FROM product";
        $resultSet = $this->Conectar()->query($sql_id);
        $resultSet->execute();
        $res = $resultSet->fetchAll(PDO::FETCH_OBJ);
		$id = $res[0]->id;
		if($id == ''){
			$id = 1;
		}
		
		
		//Insert table product
        $sql = "INSERT INTO product (product_id,product_sku, product_name, product_price, product_quantity,product_description)"
                . "values(:id,:sku,:name,:price,:quantity,:description)";
        $statement = $this->Conectar()->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->bindValue(":sku", $product->getskuProduct());
		$statement->bindValue(":name", $product->getnameProduct());
		$statement->bindValue(":price", $product->getpriceProduct());
		$statement->bindValue(":quantity", $product->getquantityProduct());
		$statement->bindValue(":description", $product->getdescriptionProduct());
        $statement->execute();
		
		//Percorre a category de produtos
		foreach($product->getcategoriesProduct() as $i=>$dados){
			
			//Insert table category_product
			$sql = "INSERT INTO category_product (product_id,category_id)"
					. "values(:idproduct,:categoryid)";
			$statement = $this->Conectar()->prepare($sql);
			$statement->bindValue(":idproduct", $id);
			$statement->bindValue(":categoryid", $dados);

			$statement->execute();
		}
    }

    public function getAll() {
        $sql = "SELECT a.*, group_concat(c.category_name) as category_name
				FROM product a 
				INNER JOIN category_product b
				ON b.product_id = a.product_id
				INNER JOIN category c
				ON c.category_id = b.category_id
				group by a.product_id";
        $resultSet = $this->Conectar()->query($sql);
        return $resultSet->fetchAll(PDO::FETCH_OBJ);
    }

    public function getId($id) {
		$sql = "SELECT a.*, group_concat(c.category_name) as category_name,group_concat(c.category_id) as categoryid
				FROM product a 
				INNER JOIN category_product b
				ON b.product_id = a.product_id
				INNER JOIN category c
				ON c.category_id = b.category_id
				WHERE a.product_id = " . (int)$id ."
				group by a.product_id";
       
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }

    public function getProduct($product) {
        $sql = "SELECT * FROM product WHERE product_name = '" . $product . "'";
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetchAll(PDO::FETCH_OBJ);
    }


    public function update(Product $product, $id) {

	    $sql = "UPDATE product SET product_sku=:sku,product_name=:name,product_price=:price,
								   product_quantity=:quantity,product_description=:description
			WHERE product_id = :id";
        $statement = $this->Conectar()->prepare($sql);
		$statement->bindValue(":id", (int)$id);
        $statement->bindValue(":sku", $product->getskuProduct());
		$statement->bindValue(":name", $product->getnameProduct());
		$statement->bindValue(":price", $product->getpriceProduct());
		$statement->bindValue(":quantity", $product->getquantityProduct());
		$statement->bindValue(":description", $product->getdescriptionProduct());
        $statement->execute();
	
		//Deleta as categoria_produto
		$sql = "DELETE FROM category_product WHERE product_id = :id";
        $resultSet = $this->Conectar()->prepare($sql);
        $resultSet->bindValue(":id", (int) $id);
        $resultSet->execute();		

		//Insert a category de produtos
		foreach($product->getcategoriesProduct() as $i=>$dados){
			
			//Insert table category_product
			$sql = "INSERT INTO category_product (product_id,category_id)"
					. "values(:idproduct,:categoryid)";
			$statement = $this->Conectar()->prepare($sql);
			$statement->bindValue(":idproduct", $id);
			$statement->bindValue(":categoryid", $dados);

			$statement->execute();
		}    

    }

    public function delete($id) {
        $sql = "DELETE FROM product WHERE product_id = :id";
        $resultSet = $this->Conectar()->prepare($sql);
        $resultSet->bindValue(":id", (int) $id);
        $resultSet->execute();
		
		$sql = "DELETE FROM category_product WHERE product_id = :id";
        $resultSet = $this->Conectar()->prepare($sql);
        $resultSet->bindValue(":id", (int) $id);
        $resultSet->execute();
    }

}
