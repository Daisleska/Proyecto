<?php include_once "../includes/menu.php"; ?>
        <div class="breadcrumbs">
           <div class="col-sm-5">
                <div class="page-header float-left">
                  <div class="page-title">
                    <h4>LISTADOS</h4>
                  </div>
                   
                        <ol class="breadcrumb text-right">
                            <li><a href="listado_inventario_granel.php">Inventario General</a></li>
                            <li class="active">Inventario Diario</li>
                        </ol>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                        <form>
                        <select class="form-control"  name="" onchange="location = this.value">

                            <option>Selecciona</option>     

                            <option value="listados_epa.php">ENVIADO A OTRA PLANTA O AGROTIENDA</option>


                            <option value="listado_inventario.php">DESPACHO A PRODUCCIÓN</option>

                            <option value="listados_ptrp.php">RECIBO DE PRODUCCIÓN P. TERMINADO</option>

                            <option value="listados_mpeop.php">MATERIA PRIMA ENVIADA A OTRAS</option>

                            <option value="lisatos_ptda.php">PRODUCTO TERMINADO DISPONIBLE EN EL ALMACEN</option>

                            <option value="listados_eicpt.php">ENVIADO A INICA CAGUA PRODUCTO TERMINADO</option>

                        </select>
                        </form>

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
                                <strong class="card-title">Reporte diario de Inventario</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Fecha de ingreso</th>
                                            <th>Codigo</th>
                                            <th>Producto</th>
                                            <th>Presentacion</th>
                                            <th>Cantidad Klg/ltrs</th>
                                            <th>Cantidad en Paletas</th>
                                            <th>Observ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>21-09-98</td>
                                            <td>#29190-0</td>
                                            <td>Hierro</td>
                                            <td>500.000 ltrs</td>
                                            <td>10.000</td>
                                            <td>20 paletas</td>
                                            <td>....</td>
                                        </tr>
                                        <tr>
                                            <td>21-09-98</td>
                                            <td>#29190-0</td>
                                            <td>Hierro</td>
                                            <td>500.000 ltrs</td>
                                            <td>10.000</td>
                                            <td>20 paletas</td>
                                            <td>....</td>
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