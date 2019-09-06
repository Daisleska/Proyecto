<<<<<<< HEAD
<?php
$connect = mysqli_connect("localhost", "root", "", "servidata");//Configurar los datos de conexion
$columns = array('id','usuario', 'actividad', 'fecha', 'hora', 'status');

$query = "SELECT * FROM auditoria WHERE ";

if($_POST["is_date_search"] == "yes") {
 $query .= 'fecha BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"])) {
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR actividad LIKE "%'.$_POST["search"]["value"].'%" 
  OR status LIKE "%'.$_POST["search"]["value"].'%" 
  OR usuario LIKE "%'.$_POST["search"]["value"].'%"
  OR hora LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else {
 $query .= 'ORDER BY fecha DESC ';
}

$query1 = '';

if($_POST["length"] != -1) {
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result)) {
 $fecha=date("d/m/Y", strtotime($row["fecha"]));			
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["usuario"];
 $sub_array[] = $row["actividad"];
 $sub_array[] = $fecha;
 $sub_array[] = $row["hora"];
 
 $data[] = $sub_array;
}

function get_all_data($connect) {
 $query = "SELECT * FROM auditoria";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
=======
<?php include_once "../includes/menu.php"; 
extract($_REQUEST);
$data=unserialize($data);
?>


  <div class="breadcrumbs">
           


                    
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="box-title"><i class="fa fa-table"></i> Auditoria</h3>  
                               
                            </div>
                            <div class="card-body">
                            
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
       
    
    
                                <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Usuario</th>
                                      <th>Fecha</th>
                                      <th>Hora</th>
                                      <th>Actividad</th>
                                  </tr>
                                </thead>

                                <tbody>
                                <?php $num=1;
                                for ($i=0; $i < $filas; $i++) { 
                                
                                echo "<tr>";    
                                ?>  
              
                                <td><?=$num?></td>
                                <?php for ($j=1; $j < $campos; $j++) { ?>
                                <td><?=$data[$i][$j]?></td>

                                <?php } ?>
                                    
                                        
                                <?php 
                                $num++;
                                }   ?>
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
>>>>>>> 500026595d8104af62dccab5bbf5025d6b263b4d
