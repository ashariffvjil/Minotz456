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
	 <link href="<?php echo base_url();?>themes/minotz/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo base_url();?>themes/minotz/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>themes/minotz/css/plugins/timeline/timeline.css" rel="stylesheet">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> 
	<?php if (isset($includes)){echo $includes;} ?>
</head>
<body>
<div id="wrapper" class="container">
		<?php echo $header; ?>
		<?php echo $content; ?>

</div>
  <script src="<?php echo base_url();?>themes/minotz/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>themes/minotz/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>themes/minotz/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="<?php echo base_url();?>themes/minotz/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>themes/minotz/js/plugins/morris/morris.js"></script>

</body>
</html>