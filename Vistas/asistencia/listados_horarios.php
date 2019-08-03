<?php include_once "../includes/menu.php"; ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Asistencia</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>C.I</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Horas Pautadas</th>
                                            <th>Horas Trabajadas</th>
                                            <th>Fecha</th>
                                            <th>Dia</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>25873122</th>
                                            <th>Juan Carlos</th>
                                            <th>Figueredo España</th>
                                            <th>5 horas</th>
                                            <th>5 horas</th>
                                            <th>10/07/2019</th>
                                            <th>Miercoles</th>
                                        </tr>
                                        <tr>
                                            <th>28147989</th>
                                            <th>Hector Argenis</th>
                                            <th>Hernandez Ceballos</th>
                                            <th>5 horas</th>
                                            <th>4 horas</th>
                                            <th>10/07/2019</th>
                                            <th>Miercoles</th>
                                        </tr>

                                        <tr>
                                            <th>25455376</th>
                                            <th>Bryanne Eduardo</th>
                                            <th>Gomez A</th>
                                            <th>5 horas</th>
                                            <th>5 horas</th>
                                            <th>10/07/2019</th>
                                            <th>Miercoles</th>
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