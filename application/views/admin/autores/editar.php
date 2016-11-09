  
<?php $this->layout('master') ?>

        <?php $this->insert('nav',['session'=>$session,'opciones'=>$opciones]) ?>


<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            lista de autores
                            <small>todos</small>
                        </h1>
                        <form action="">
                            <label> Nombre
                                <input type="text" class="control-form" placeholder="Nombre">
                            </label>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
