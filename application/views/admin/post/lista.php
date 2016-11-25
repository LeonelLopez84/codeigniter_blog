<?php $this->layout('master') ?>

		<?php $this->insert('nav',['session'=>$session,'opciones'=>$opciones]) ?>
		       
	 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista de Post
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
                        		<th>Picture</th>
                        		<th>Title</th>
                        		<th>Featured</th>
                                <th>Enabled</th>
                                <th>Date</th>
                                <th>Author</th>
                        		<th>Action</th>
                        	</tr>
                        </thead>
                        <tbody>
	                        <?php foreach ($post as $a=> $val){ ?>
	                        	  <tr>
	                        	  	<td><?php echo $val->id ?></td>
	                        	  	<td>
	                               		<img class="img-responsive img-thumbnail" src="<?php echo base_url('assets/img/post/'.$val->id).'.jpg'; ?>">
	                            	</td>
									<td>
	                               		<a href="index.html"><?php echo $val->title ?></a>
	                            	</td>
                                     <td>
                                        <i class="<?php echo ($val->featured)?'fa fa-star':'fa fa-star-o'; ?>"></i>
                                    </td>
                                     <td>
                                        <i class="<?php echo ($val->enabled)?'fa fa-eye':'fa fa-eye-slash'; ?>"></i>
                                    </td>
                                    <td>
                                        <?php echo $val->date ?>
                                    </td>
	                            	<td>
                                        <?php echo $val->author->username ?>
	                            	</td>
	                            	<td>
	                            		<a href="<?php echo base_url('/admin/post/editar/'.$val->id) ?>" class="btn btn-small btn-info"><i class="fa fa-pencil"></i></a>
	                            		<a href="<?php echo base_url('/admin/post/borrar/'.$val->id) ?>" class="btn btn-small btn-danger" name="" value="<?php echo $val->id ?>"><i class="fa fa-trash"></i></a>
	                            	</td>
	                            </tr>
	                        <?php } ?>
	                    	</tbody>
                        </table>

                        <blockquote >
                            <pre><?php echo $post->redner() ?></pre>  
                        </blockquote>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->