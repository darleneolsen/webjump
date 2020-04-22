
 
		$(document).ready(function() {
			//Carrega as categorias
			
	
			var action = 2;
			console.log("teste");
			$.ajax({
				  type: "POST",
				  url: '../../webjump/controller/CategoryController.php',
				  data: {action:action,id:id},
				  async: false,
				  success: function(data) {
						var obj = JSON.parse(data);
						//Inserido os dados nos campos
						$("#category_name").val(obj.category_name);
						$("#category_code").val(obj.category_code);
						
					
				  }
			});
			
			
			//verifica se tem id e é edicao
			var id 		= $("#id").val();
			var action 	= $("#action").val();
			if(id != '' && action == '4'){
				//Resgatar os dados
				var action = 2;
				$.ajax({
					  type: "POST",
					  url: '../../webjump/controller/CategoryController.php',
					  data: {action:action,id:id},
					  async: false,
					  success: function(data) {
							var obj = JSON.parse(data);
							//Inserido os dados nos campos
							$("#category_name").val(obj.category_name);
							$("#category_code").val(obj.category_code);
							
						
					  }
				});
				
			}
			
			$('#form-cad-category').validate({
			rules:{
				
				category_code: "required",
				category_name: "required",
				
				
			},
			messages:{
				category_code: "* Campo obrigatorio",
				category_name: "* Campo obrigatorio",
									
			},
			
				//$( "#form-cad-category" ).submit(function( event ) {
				submitHandler: function(form) {
					
					$.ajax({
						  type: "POST",
						  url: '../../webjump/controller/CategoryController.php',
						  data: $("#form-cad-category").serialize(),
						  async: false,
						  success: function(data) {
							if($.isNumeric(data)){
								
								resp = data;
								alert("Categoria adicionada com sucesso.");
								window.location.href="categories.php";
							}else{
								alert(data);
								return false;
							}
						  }
						});
				}
			});
	
	});
	
		
	function deleteCategory(id){
			var action = 3;
			$.ajax({
			  type: "POST",
			  url: '../controller/CategoryController.php',
			  data: {action:action, id:id},
			  async: false,
			  success: function(data) {
				if($.isNumeric(data)){
					
					resp = data;
					alert("Categoria excluida com sucesso.");
					window.location.href="categories.php";
				}
			  }
			});
		}
 