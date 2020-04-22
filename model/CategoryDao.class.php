<?php

require_once '../dao/Conexao.php';
require_once 'Product.class.php';

class CategoryDao extends Conexao {

    public function insert(Category $category) {
	
        $sql = "INSERT INTO category (category_name, category_code)"
                . "values(:name,:code)";
        $statement = $this->Conectar()->prepare($sql);
        $statement->bindValue(":name", $category->getNameCategory());
        $statement->bindValue(":code", $category->getCodeCategory());
        $statement->execute();
    }

    public function getAll() {
        $sql = "SELECT * FROM category";
        $resultSet = $this->Conectar()->query($sql);
        return $resultSet->fetchAll(PDO::FETCH_OBJ);
    }

    public function getId($id) {
        $sql = "SELECT * FROM category WHERE category_id = " . (int)$id;
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetch(PDO::FETCH_OBJ);
    }

    public function getCategory($category) {
        $sql = "SELECT * FROM category WHERE category_name = '" . $category . "'";
        $resultSet = $this->Conectar()->query($sql);
        $resultSet->execute();
        return $resultSet->fetchAll(PDO::FETCH_OBJ);
    }


    public function update(Category $category, $id) {
        $sql = "UPDATE category SET category_name=:category_name,category_code=:category_code WHERE category_id = :id";
        $statement = $this->Conectar()->prepare($sql);
        $statement->bindValue(":category_name", $category->getNameCategory());
        $statement->bindValue(":category_code", $category->getCodeCategory());
        $statement->bindValue(":id", (int) $id);
        $statement->execute();

    }

    public function delete($id) {
        $sql = "DELETE FROM category WHERE category_id = :id";
        $resultSet = $this->Conectar()->prepare($sql);
        $resultSet->bindValue(":id", (int) $id);
        $resultSet->execute();
    }

}
