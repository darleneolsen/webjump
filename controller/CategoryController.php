<?php
error_reporting(0);
require_once '../model/Category.class.php';
require_once '../model/CategoryDao.class.php';
extract($_REQUEST);
session_start();


//$category_name = '';
//$category_code = '';
switch ($action) {
    case '1':
		//Inserção
		
		    
		//Enviando dados para o Objeto de categoria
		$category = new Category($category_name, $category_code);
		
        //Verifica se os dados estão preenchidos		
		$retorno = $category->validateEmpty();
		
		if($retorno != null){
			echo $retorno;
		}else{


			//Acesso ao Dao
			$daoCategory = new CategoryDao();
			
			//Variavel para comparação de igualdade de registro
			$cat_nome = $daoCategory->getCategory($category_name);

			/*Verifica duplicidade da categoria
			 * usando a função strcasecmp para comparar sem case sensitive
			*/
			if (!strcasecmp($cat_nome[0]->category_name,$category->getNameCategory())) {
				echo ("Categoria já existente!");
			} else {
				$daoCategory->insert($category);
				echo ("1");
			}
            
		}
        break;
    case 2:
        //Resgatando registro
        $daoCategory = new CategoryDao();
        $data = $daoCategory->getId($_REQUEST['id']); //Passando parametro do id do registro a ser deletado
        echo json_encode($data);

        break;
    case 3:
        //Deletando registro
        $daoCategory = new CategoryDao();
        $daoCategory->delete($_REQUEST['id']); //Passando parametro do id do registro a ser deletado
		echo "1";
        break;
    case 4:
        //Alteração
    
		//Enviando dados para o Objeto de categoria
		$category = new Category($category_name, $category_code);
		
        //Verifica se os dados estão preenchidos		
		$retorno = $category->validateEmpty();
		
		if($retorno != null){
			echo $retorno;
		}else{


			//Acesso ao Dao
			$daoCategory = new CategoryDao();
			
			//Variavel para comparação de igualdade de registro
			$cat_nome = $daoCategory->getCategory($category_name);
				
			
			/*Verifica duplicidade da categoria
			 * usando a função strcasecmp para comparar sem case sensitive
			*/
			/*if (!strcasecmp($cat_nome[0]->category_name,$category->getNameCategory())) {
				echo ("Categoria já existente!");
			} else {*/
				$daoCategory->update($category,$id);
				echo ("1");
			//}
		}   
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