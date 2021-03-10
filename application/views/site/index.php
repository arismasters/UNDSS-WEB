<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?=$this->template->site_title;?></title>
    <meta charset="utf-8" />
    <!-- <meta http-equiv="refresh" content="3" /> -->
    <meta name="keywords" content="<?=$this->template->meta_keywords;?>" />
    <meta name="description" content="<?=$this->template->meta_description;?>" />
    <!-- Favicon-->
    <link rel="icon" href="<?=(!is_null($this->template->site_logo)) ? $this->template->site_logo:base_url('assets/favicon.ico');?>" type="image/x-icon">

    <!-- uikit Css -->
    <link href="<?=base_url();?>assets/css/uikit.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
    <!-- Jquery Core Js -->
    <script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/custom.js"></script>

    <!-- Material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <?=$_header;?>
    <!-- end header -->

    <?=$_content;?>

    <?=$_footer;?>

    <!-- uikit Js -->
    <script src="<?=base_url();?>assets/js/uikit.js"></script>
    <script src="<?=base_url();?>assets/js/uikit-icons.js"></script>
</body>
</html>