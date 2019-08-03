<?php include_once "../includes/menu.php"; ?>

       <section style="padding-left: 10px;"  class="content-header" class="col-md-12">
      <h1>Tablero<small> / Bitacora</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tablero</a></li>
        <li class="active">Bitacora</li>
      </ol>
    </section>
    <!-- Main content -->
    <section style="padding-left: 10px;"  class="invoice">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-danger">
          <div class="box-header">
            <div class="col-xs-2"><br>
              <h3 class="box-title"><i class="fa fa-table"></i> Auditoria</h3>  
            </div>
            <div class="box-body">
              <div class="table-responsive"  style="overflow-x: hidden;">
                <div class="row">
                  <div class="input-daterange">
                    <div class="col-md-6">
                      <div data-date-format="yyyy/mm/dd" data-date="yyyy/mm/dd" class="input-group input-large">
                        <input type="text" name="start_date" id="start_date" class="form-control dpd1" placeholder="Desde"/>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="end_date" id="end_date" class="form-control dpd2" placeholder="Hasta"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button type="button" name="search" id="search" class="btn btn-primary active" ><i class="fa fa-search"></i> Buscar</button>
                  </div>
                </div><br>
              </div>
              <table id="order_data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Actividad</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
        </div>
        </div>
      </div>
    </section>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    



    

    <!-- Right Panel -->

<?php include_once "../includes/footer.php"; ?>