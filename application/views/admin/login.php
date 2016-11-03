<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php 
        echo link_tag('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
        echo link_tag('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'); 
        echo link_tag('assets/css/login.css');
        ?>


</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login via site</h3>
                </div>
                <div class="panel-body">
                    <?php if(!empty(validation_errors())){ ?>
                        <div class="alert alert-danger" role="alert">
                       <?php echo  validation_errors(); ?>
                       </div>
                    <?php }  

                     echo form_open('admin/login/process',$form); ?>
                
                    <fieldset>
                        <div class="form-group">
                       <?php
                            echo form_input($username);
                         ?> 
                        </div>
                        <div class="form-group">
                           <?php echo form_input($password); ?>
                        </div>
                        <div class="checkbox">
                            <label>
                                <?php echo form_input($rememberme); ?>Remember Me
                            </label>
                        </div>
                        <?php echo form_input($submit) ?>
                    </fieldset>
                    <?php echo form_close(); ?>

                      <hr/>
                    <center><h4>OR</h4></center>
                    <input class="btn btn-lg btn-facebook btn-block" type="submit" value="Login via facebook">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
