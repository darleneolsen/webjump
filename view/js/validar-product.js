
		$(document).ready(function() {
			
			var formatter = new Intl.NumberFormat('pt-BR', {
			  style: 'currency',
			  currency: 'BRL',
			});

	
			
			$("#product_price").maskMoney({showSymbol: false,  decimal: ",", thousands: "."});
			
			//Carrega a lista de categorias na tela de Produto
				var action = 5;
				$.ajax({
					  type: "POST",
					  url: '../../webjump/controller/CategoryController.php',
					  data: {action:action,id:id},
					  async: false,
					  success: function(data) {
				
							//Inserido os dados nos campos
							$("#produto_category").html(data);
							
						
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
					  url: '../../webjump/controller/ProductController.php',
					  data: {action:action,id:id},
					  async: false,
					  success: function(data) {
							var obj = JSON.parse(data);
							var price = formatter.format(obj.product_price); 
							
							//Inserido os dados nos campos
							$("#product_sku").val(obj.product_sku);
							$("#product_name").val(obj.product_name);
							$("#product_description").val(obj.product_description);
							$("#product_price").val(price.replace("R$",""));
							$("#product_quantity").val(obj.product_quantity);
					
						
												
							//Pega o id das categorias
							var str = obj.categoryid;
							var substr = str.split(',');
							$.each(substr, function(i,id) { 
								$('#produto_category option').each(function(index) {
									//atribui ao selected ao id
									if (id == $(this).val()) {
										$(this).attr('selected', 'selected');
										
									}
								});
							});
							
						
					  }
				});
				
			}
			
			$('#form-cad-product').validate({
			rules:{
				product_sku: "required",
				product_name: "required",
				product_price: "required",
				product_quantity: "required",
				product_description: "required",
				produto_category: "required",
			},
			messages:{
				product_sku: "* Campo obrigatorio",
				product_name: "* Campo obrigatorio",
				product_price: "* Campo obrigatorio",
				product_quantity: "* Campo obrigatorio",
				product_description: "* Campo obrigatorio",
				produto_category: "* Campo obrigatorio",
				
									
			},
			
				//$( "#form-cad-category" ).submit(function( event ) {
				submitHandler: function(form) {
					
					$.ajax({
						  type: "POST",
						  url: '../../webjump/controller/ProductController.php',
						  data: $("#form-cad-product").serialize(),
						  async: false,
						  success: function(data) {
							if($.isNumeric(data)){
								
								resp = data;
								alert("Produto adicionadao com sucesso.");
								window.location.href="products.php";
							}else{
								alert(data);
								return false;
							}
						  }
						});
				}
			});
	
	});
 
 	function deleteProduct(id){

			var action = 3;
			$.ajax({
			  type: "POST",
			  url: '../controller/ProductController.php',
			  data: {action:action, id:id},
			  async: false,
			  success: function(data) {
				if($.isNumeric(data)){
					
					resp = data;
					alert("Produto excluida com sucesso.");
					window.location.href="products.php";
				}
			  }
			});
		}