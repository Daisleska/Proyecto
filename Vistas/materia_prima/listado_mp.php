
<?php include_once "../includes/menu.php"; ?>

        <div class="breadcrumbs">
           
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <div>
                            LISTADO
                        </div>
                  </div>
                </div>
            </div>

                        <div class="col-sm-7">
                <div class="page-header float-right">
                   <ol class="breadcrumb text-right">
                            <li><a href="listado_otroproveedor.php">Recibido de otro Proveedor</a></li>

                            <li class="active">Recibido INICA Cagua</li>
                        </ol>
                </div>
            </div>

                    
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-list"></i>   Reporte diario de Inventario</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>#Codigo</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Unidad</th>
                                            <th>stock min</th>
                                            <th>stock max</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12-03-2000</td>
                                            <td>293809830</td>
                                            <td>METANOL</td>
                                            <td>1.000</td>
                                            <td>ltrs</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>12-03-2000</td>
                                            <td>293809830</td>
                                            <td>METANOL</td>
                                            <td>1.000</td>
                                            <td>ltrs</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>12-03-2000</td>
                                            <td>293809830</td>
                                            <td>METANOL</td>
                                            <td>1.000</td>
                                            <td>ltrs</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                       <tr>
                                            <td>12-03-2000</td>
                                            <td>293809830</td>
                                            <td>METANOL</td>
                                            <td>1.000</td>
                                            <td>ltrs</td>
                                            <td></td>
                                            <td></td>
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

    <?php include_once "../includes/footer.php"; ?>