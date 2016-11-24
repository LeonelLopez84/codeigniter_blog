<?php $this->layout('master') ?>

<?php $this->insert('nav',['session'=>$session,'opciones'=>$opciones]) ?>



<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="page-header">
                            Borrar Categoría
                        </h1>
                        <p>Seguro que desea borrar la siguiente categoría </p>
                        <p><?php echo $categoria->name ?> </p>
                       <a href="<?php echo base_url('/admin/categorias/todas-las-categorias') ?>" class="btn btn-default" role="button">Cancelar</a>
						<a href="<?php echo base_url('/admin/categorias/delete/'.$categoria->id) ?>" class="btn btn-danger" role="button">Borrar</a> 
                    </div>
                </div>
            </div>
        </div>