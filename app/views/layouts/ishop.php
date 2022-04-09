<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<base href="/">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?=PATH?>/assets-ishop/bootstrap/css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=PATH?>/assets-ishop/css/magnific-popup.css">
	<link rel="stylesheet" href="<?=PATH?>/assets-ishop/css/main.css">
	<?=$this->getMeta()?>
</head>
<body>
	<?=$this->getPart('header')?>

	<?=$content?>

	<?=$this->getPart('footer')?>

	<button id="top">
		<i class="fas fa-angle-double-up"></i>
	</button>

	<script>
		const PATH = '<?=PATH?>';
	</script>
	<script src="<?=PATH?>/assets-ishop/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		crossorigin="anonymous"></script>
	<script src="<?=PATH?>/assets-ishop/js/jquery.magnific-popup.min.js"></script>
	<script src="<?=PATH?>/assets-ishop/js/main.js"></script>

</body>
</html>

<?=$this->getDbLogs()?>
