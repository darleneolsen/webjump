<?php
error_reporting(0);
require_once '../model/Product.class.php';
require_once '../model/ProductDao.class.php';
extract($_REQUEST);
session_start();

//$category_name = '';
//$category_code = '';
switch ($action) {
    case '1':
		//Inserindo o registro
		
		//convert o price
		$product_price = str_replace(".","", $product_price);
		$product_price = str_replace(",",".", $product_price);
		
		//Enviando dados para o Objeto de categoria
		$product = new Product($product_sku, $product_name, $product_price,$product_quantity,$produto_category,$product_description);

		//Acesso ao Dao
		$daoProduct = new ProductDao();

		//Inserção no banco
		$daoProduct->insert($product);
		
		echo ("1");
            
		
        break;
    case 2:
        //Resgatando registro
        $daoProduct = new ProductDao();
        $data = $daoProduct->getId($_REQUEST['id']); //Passando parametro do id do registro a ser deletado
		
		echo json_encode($data);

        break;
    case 3:
        //Deletando registro
        $daoProduct = new ProductDao();
        $daoProduct->delete($_REQUEST['id']); //Passando parametro do id do registro a ser deletado
		echo "1";
        break;
    case 4:
        //Alterando o registro
    
		//convert o price
		$product_price = str_replace(".","", $product_price);
		$product_price = str_replace(",",".", $product_price);
		
		//Enviando dados para o Objeto de categoria
		$product = new Product($product_sku, $product_name, $product_price,$product_quantity,$produto_category,$product_description);

		//Acesso ao Dao
		$daoProduct = new ProductDao();
	
		//Aterando o registro
		$daoProduct->update($product,$id);
		echo "1";
	
        break;
        case 5:
        //Pega a lista de categoria para o produto 
		$daoCategory = new CategoryDao();
        $data = $daoCategory->getAll();; //Passando parametro do id do registro a ser deletado
	
		$selected = "";
		foreach ($data  as $key => $value) {
		
			if(count($produtos) == 1){
				$selected = "selected";
			}
		  $html .= "<option value='".$value->category_id."' ".$selected.">".utf8_encode($value->category_name)."-".($value->category_code)."</option>";
		}
		echo $html;
	
        break;
    
    default:
        break;
}
?>