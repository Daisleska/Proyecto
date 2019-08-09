<?php include_once "../includes/menu.php"; 

?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
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
                                <strong class="card-title">Asistencia del Día</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                         
                                            
                                            <th>Cedula</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Asistente</th>
                                            <th>Inasistente</th>
                                            <th>Inasistente Justifiado</th>
                                        
                                        </tr>
                                             
                                             <th></th>
                                             <th></th>
                                             <th></th>
                                             <th><input type="checkbox" name="A" value="A"></th>
                                             <th><input type="checkbox" name="I" value="I"></th>
                                             <th> <input type="checkbox" name="IJ" value="IJ"><div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class=" form-control-label"></label></div>
                                            <div class="col-12 col-md-7"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                                            </div></th>


                                   
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
