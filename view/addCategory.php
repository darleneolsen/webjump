<?php
error_reporting(0);
include("header.php");
session_start();
extract($_REQUEST);
isset($action) ? $_SESSION['action'] = '4': $_SESSION['action'] = '1';
?>
<!doctype html>
<html ⚡>
<head>
  <title>Webjump | Backend Test | Add Category</title>
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

  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Category</h1>
    
    <form id="form-cad-category" name="form-cad-category" method="POST">
	<input type="hidden" name="action" id="action" value="<?php echo $_SESSION['action']; ?>">
	<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input type="text" id="category_name" name="category_name" class="input-text categor_name"" />
        
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="text" id="category_code" name="category_code" class="input-text category_code" />
        
      </div>
      <div class="actions-form">
        <a href="categories.php" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
      </div>
    </form>
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
