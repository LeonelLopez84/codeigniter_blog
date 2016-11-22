<?php $this->layout('master') ?>

<?php $this->insert('nav',['session'=>$session,'opciones'=>$opciones]) ?>

<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="page-header">
                            Crear Categoria
                        </h1>

	 					 <?php if(!empty(validation_errors())){ ?>
	                        <div class="alert alert-danger" role="alert">
	                       <?php echo  validation_errors(); ?>
	                       </div>
	                    <?php }  ?>
						<div class="row">
	                    	<div class="col-sm-6 col-md-6 col-lg-6">
	                    	<?php echo form_open_multipart('admin/categorias/create',$form); ?>
							  <div class="form-group">
							    <label >Name</label>
							     <?php echo form_input($name); ?>
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