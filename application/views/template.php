<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<meta name="viewport" content="width =device-width" />
		<?php $links = new ViewFile; ?>
		<?php $links->style() ?>
		<title>
			title();
		</title>

	</head>
	<body>
<?php
include_once( 'attach/header.php' );
?>
<div class="wrapper">
<?php
include_once( 'attach/main.php' );
?>
</div>
<?php
include_once( 'attach/footer.php' );
if( isset( $_GET['a'] ) ) echo require_once( 'attach/auth/' . $_GET['a'] . '.php' );
?>
</body>
	<?php $links->scripts() ?>
</html>
	
