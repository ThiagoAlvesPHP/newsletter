<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=320px">
<title>Newsletter</title>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css" type="text/css" />

</head>
<body>

<div class="container">
<!-- AQUI COLOCAREMOS AS VIES DO SITE -->
<?php $this->loadViewInTemplate($viewName, $viewData); ?>
</div>

<!-- AQUI COLOCAREMOS O FOOTER -->


<script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script src="<?=BASE_URL; ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  //EDITOR
  CKEDITOR.replace('conteudo');
</script>
</body>
</html>
