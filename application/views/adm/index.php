<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?=$this->template->site_title;?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?=(!is_null($this->template->site_logo)) ? $this->template->site_logo:base_url('assets/favicon.ico');?>" type="image/x-icon">

    <!-- uikit Css -->
    <link href="<?=base_url();?>assets/css/uikit.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- Jquery Core Js -->
    <script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/plugins/tinymce/jquery.tinymce.min.js"></script>
    <script src="<?=base_url();?>assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="<?=base_url();?>assets/js/custom.js"></script>
</head>
<body>
    <!-- header -->
    <?=(is_null($this->template->with_side_menu)) ? '':$_header;?>
    <!-- end header -->
    <div class="uk-container-expand ml-40" uk-height-viewport="offset-bottom: 15">
        <?=$_content;?>
    </div>

    <!-- uikit Js -->
    <script src="<?=base_url();?>assets/js/uikit.js"></script>
    <script src="<?=base_url();?>assets/js/uikit-icons.js"></script>
</body>
</html>