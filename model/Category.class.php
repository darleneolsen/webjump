<?php

class Category {
    private $nameCategory;
    private $codeCategory;

    
    function __construct($nameCategory, $codeCategory) {
        $this->nameCategory = $nameCategory;
        $this->codeCategory = $codeCategory;
      
    }
    
    public function getNameCategory() {
        return $this->nameCategory;
    }

    public function getCodeCategory() {
        return $this->codeCategory;
    }


    public function setNameCategory($nameCategory) {
        $this->nameCategory = $nomeProduto;
    }

    public function setCodeCategoryo($codeCategory) {
        $this->codeCategory = $codeCategory;
    }
	
	//Valida os campos
	public function validateEmpty(){
	   $msg = null;
	
		if (empty($this->nameCategory)) {
			$msg .= "Category Name \n";
		}
		if (empty($this->codeCategory)) {
			$msg .= "Category Code  \n";
		}		
		if($msg != null){
			return "Os seguintes campos são obrigatórios: \n".$msg;
		}else{
			return $msg;
		}
	}


}
?>