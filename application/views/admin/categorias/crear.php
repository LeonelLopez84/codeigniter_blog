<?php $this->layout('master') ?>

<?php $this->insert('nav',['session'=>$session,'opciones'=>$opciones]) ?>

<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="page-header">
                            Crear autor
                        </h1>

	 					 <?php if(!empty(validation_errors())){ ?>
	                        <div class="alert alert-danger" role="alert">
	                       <?php echo  validation_errors(); ?>
	                       </div>
	                    <?php }  ?>
						<div class="row">
	                    	<div class="col-sm-6 col-md-6 col-lg-6">
	                    	<?php echo form_open_multipart('admin/autores/create',$form); ?>
							  <div class="form-group">
							    <label >Username</label>
							     <?php echo form_input($username); ?>
							  </div>
							   <div class="form-group">
							    <label >Email</label>
							     <?php echo form_input($email); ?>
							  </div>
							  <div class="form-group">
							    <label >Password</label>
							    <?php echo form_input($password); ?>
							  </div>
							  <div class="form-group">
							    <label>Confirm Password</label>
							    <?php echo form_input($passconf); ?>
							  </div>
							  <div class="form-group">
							   <?php if(isset($error_file)){ ?>
	                        <div class="alert alert-danger" role="alert">
	                       <?php echo $error_file['error'] ?>
	                       </div>
	                    <?php }  ?>
							    <label>Photo</label>
							    <?php echo form_input($userfile); ?>
							    <p class="help-block">Photo de perfil.</p>
							  </div>
							  <?php echo form_input($submit) ?>
							 <?php echo form_close(); ?>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">

							</div>
						</div>	
                	</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>