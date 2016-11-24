<?php $this->layout('master') ?>

<?php $this->insert('nav',['session'=>$session,'opciones'=>$opciones]) ?>

<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="page-header">
                            Crear Post
                        </h1>

	 					 <?php if(!empty(validation_errors())){ ?>
	                        <div class="alert alert-danger" role="alert">
	                       <?php echo  validation_errors(); ?>
	                       </div>
	                    <?php }  ?>
							<div class="row">
	                    	<div class="col-sm-6 col-md-6 col-lg-6">
	                    	<?php echo form_open_multipart('admin/post/create',$form); ?>
							  <div class="form-group">
							    <label >Title</label>
							     <?php echo form_input($title); ?>
							  </div>
							   <div class="form-group">
							   <?php if(isset($error_file)){ ?>
	                        <div class="alert alert-danger" role="alert">
	                       <?php echo $error_file['error'] ?>
	                       </div>
	                    <?php }  ?>
							    <label >Banner</label>
							    <?php echo form_input($banner); ?>
							    <p class="help-block">Photo de perfil.</p>
							  </div>
							   <div class="form-group">
							    <label >Article</label>
							     <?php echo form_textarea($article) ?>
							  </div>
							  <div class="form-group">
							    <label>Featured
										<?php echo form_input($featured); ?>
                  </label>
							  </div>
							  <div class="form-group">
							    <label>Enabled
										<?php echo form_input($enabled); ?>
                  </label>
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