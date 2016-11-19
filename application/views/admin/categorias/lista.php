<?php $this->layout('master') ?>

		<?php $this->insert('nav',['session'=>$session,'opciones'=>$opciones]) ?>
		       
	 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista de Categorias
                            <small>todos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>


                        <table class="table table-condensed">
                        <thead>
                        	<tr>
                        		<th>#</th>
                        		<th>Name</th>
                        		<th>Regisgtro</th>
                        		
                        	</tr>
                        </thead>
                        <tbody>
	                        <?php foreach ($categorias as $a=> $val){ ?>
	                        	  <tr>
	                        	  	<td><?php echo $val->id ?></td>
	                        	  	
									<td>
	                               		<?php echo $val->name ?>
	                            	</td>
	                            	<td>
	                               		<?php echo $val->date_created ?>
	                            	</td>
	                            	<td>
	                            		<a href="<?php echo base_url('/admin/categorias/editar/'.$val->id) ?>" class="btn btn-small btn-info"><i class="fa fa-pencil"></i></a>
	                            		<a href="<?php echo base_url('/admin/categorias/borrar/'.$val->id) ?>" class="btn btn-small btn-danger" name="" value="<?php echo $val->id ?>"><i class="fa fa-trash"></i></a>
	                            	</td>
	                            </tr>
	                        <?php } ?>
	                    	</tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->