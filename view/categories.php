<?php
include("header.php");
error_reporting(0);

?>
<!doctype html>
<html ⚡>
<head>
  <title>Webjump | Backend Test | Categories</title>
  <meta charset="utf-8">

<link  rel="stylesheet" type="text/css"  media="all" href="css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<meta name="viewport" content="width=device-width,minimum-scale=1">
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script></head>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/validar-category.js"></script>
<body>
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Categories</h1>
      <a href="addCategory.php" class="btn-action">Add new Category</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Code</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
	  <?php
	  

				require_once '../model/CategoryDao.class.php';
				/* Busca todos as categorias para exibirmos em um lista, 
					com  operações de edição e remoção.
				 */
				$daoCategory = new CategoryDao();

				/* Caso tenha sido enviado algum dado da mesma pagina
				 * verifica-se na busca quais foram requisitados.
				 * 
				 *			 * 
				 */

				$categories = $daoCategory->getAll(); //Resgata todos os registros
		
				//Percorre o array
				foreach($categories as $id=>$result){
					
				
		?>							
	  
				  <tr class="data-row">
					<td class="data-grid-td">
					   <span class="data-grid-cell-content"><?php echo $result->category_name;?></span>
					</td>
				  
					<td class="data-grid-td">
					   <span class="data-grid-cell-content"><?php echo $result->category_code;?></span>
					</td>
				  
					<td class="data-grid-td">
					  <div class="actions">
						<div class="action edit"><span> <a href="addCategory.php?action='4'&id=<?php echo $result->category_id;?>">Edit</a></span></div>
						<div class="action delete"><span><a href="javascript: void(0);" onClick="deleteCategory(<?php echo $result->category_id;?>);">Delete</a></span></div>
					  </div>
					</td>
				  </tr>
	<?php 
	//fim do foreach 
		} 
	?>
    </table>
  </main>
  <!-- Main Content -->

  <!-- Footer -->
<footer>
	<div class="footer-image">
	  <img src="images/go-jumpers.png" width="119" height="26" alt="Go Jumpers" />
	</div>
	<div class="email-content">
	  <span>go@jumpers.com.br</span>
	</div>
</footer>
 <!-- Footer --></body>
</html>
