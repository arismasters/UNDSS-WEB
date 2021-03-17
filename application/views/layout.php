<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?=$this->config->item('apps_name')?></title>
		<link rel="shortcut icon" type="image/png" href="<?=base_url().$this->config->item('apps_favicon')?>"/>

		<!-- CSS Declaration -->
		<!-- UIkit CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
		
		<!-- Material Icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css" />
	</head>
	<body>

		<?php if (!isset($base)){ ?>
			<?php $menu_collapsed = (isset($menu_collapsed) ? $menu_collapsed : false); ?>
			<?php $this->load->view('navigation', array("menu"=>$menu, "menu_collapsed"=> $menu_collapsed)); ?>
			<?php $this->load->view('header'); ?>
			<div class="container <?=($menu_collapsed) ? 'collapsed' : ''?>">
				<?php
					if(isset($page)) {
						if(isset($items)) $this->load->view($page, $items);
						else $this->load->view($page);
					}
				?>
			</div>
		<?php } else { ?>
			<?php
					if(isset($page)) {
						if(isset($items)) $this->load->view($page, $items);
						else $this->load->view($page);
					}
				?>
		<?php } ?>
		
		<!-- UIkit JS -->
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit-icons.min.js"></script>

		<!-- JQuery JS -->
		<script src="<?=base_url()?>assets/js/jquery.min.js"></script>

		<!-- Custom JS -->
		<script src="<?=base_url()?>assets/js/main.js"></script>
		<script src="<?=base_url()?>assets/js/process.js"></script>
	</body>
</html>
