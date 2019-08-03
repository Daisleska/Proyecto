<?php include_once "../includes/menu.php"; ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Listado</h1>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Listados de Empleados</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>C.I</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Teléfono</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Condición</th>
                                            <th>Opción</th>
                                                                                   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>25873122</th>
                                            <th>Juan Carlos</th>
                                            <th>Figueredo España</th>
                                            <th>04243163502</th>
                                            <th>25/05/2019</th>
                                            <th>Fijo</th>
                                            <th><button class="btn btn-secondary">Ver más</button></th>
                                            
                                        </tr>
                                        <tr>
                                            <th>28147989</th>
                                            <th>Hector Argenis</th>
                                            <th>Hernandez Ceballos</th>
                                            <th>04268485989</th>
                                            <th>21/06/2019</th>
                                            <th>Contratado</th>
                                            <th><button class="btn btn-secondary">Ver más</button></th>
                                    
                                           
                                        </tr>

                                        <tr>
                                            <th>25455376</th>
                                            <th>Bryanne Eduardo</th>
                                            <th>Gomez Acevedo</th>
                                            <th>04269876556</th>
                                            <th>16/04/2019</th>
                                            <th>Contratado</th>
                                            <th><button class="btn btn-secondary">Ver más</button></th>
                                        
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php include_once "../includes/footer.php"; ?>
