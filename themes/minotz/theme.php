<!DOCTYPE html><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Mainframe - The complete PHP framework" />
	<meta name="keywords" content="" />
	<meta name="language" content="en" />
	<title>Minotz</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/minotz/css/mainframe-grid.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/minotz/css/mainframe-main.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/minotz/css/bootstrap.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/minotz/css/styles.css?v=<?php echo $this->config->item('cjsuf');?>" media="screen" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> 
	<?php if (isset($includes)){echo $includes;} ?>
</head>
<body>
<div class="container">
		<?php echo $header; ?>
		<?php echo $content; ?>

</div>
 <script src="<?php echo base_url();?>themes/minotz/js/bootstrap.min.js"></script>
</body>
</html>