<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
   <?php
   		echo link_tag('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
   		echo link_tag('assets/css/admin/sb-admin.css');
		echo link_tag('assets/bower_components/font-awesome/css/font-awesome.min.css');
        echo link_tag('assets/bower_components/medium-editor/dist/css/medium-editor.min.css');
        
	?>
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

		<?php echo $this->section('content') ?>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <footer>Codeigniter blog</footer>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/medium-editor/dist/js/medium-editor.min.js'); ?>"></script>
    <script>
        var editor = new MediumEditor('.article');
    </script>

</body>

</html>


</body>
</html>