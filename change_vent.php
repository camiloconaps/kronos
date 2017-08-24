<?php
include ("val_session.php");
include ("bd_conf/conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="bower_components/sweetalert2/dist/sweetalert2.js"></script>
<link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.css">

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script>
//$("#cambio_div").load("change_prod.php");
function cambiar_vent(id_camp,n_camp){
	swal({
  		title: '¿Esta seguro? ',
  		text: n_camp+" cambiara de estado a ventana.",
  		type: 'warning',
  		showCancelButton: true,
  		confirmButtonColor: '#3085d6',
  		cancelButtonColor: '#d33',
  		confirmButtonText: 'Si, Pasar a ventana!',
  		cancelButtonText: 'NO'
	}).then(function () {
		$.post( "change_estado.php",{ campid: id_camp, idest:"4" }, function( data ) {
			if (data == "Error"){
 				$( "#result" ).html( data );
			}else{
				$("#cambio_div").load("change_vent.php");
			}
		});
		swal(
			'Nuevo Estado '+n_camp+':',
    			'Ventana.',
    			'success'
  		)
	})
}
//});
</script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div >
<section class="content-header">
      <h1>
        Dashboard ICC Apolo
      </h1>
      <ol class="breadcrumb">
        <li><a href="control.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cambio Ventana</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
	<?php
        $sql = "SELECT COUNT(*) CNT,ESTADO FROM Campanas WHERE ESTADO = 4 GROUP BY ESTADO";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        	while($line = $result->fetch_assoc()) {
                	$cnt= $line[CNT];
	        }
        }
	if($cnt==""){
                $cnt=0;
        }

        ?>

	<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-android-checkbox-outline-blank"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ventana</span>
              <span class="info-box-number"><?php echo $cnt;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <div>
	<table class="table">
		<thead>
      			<tr>
        			<th>Estado</th>
        			<th>Campana</th>
      			</tr>
    		</thead>
    		<tbody>

		<?php
		$sql = " SELECT * FROM Campanas";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
			$array = array();
			while($line = $result->fetch_assoc()) {
				if ($line[ESTADO]==1){
				echo "<tr class='success'>";
				?>
					<td> <input onchange='cambiar_vent("<?php echo$line[ID_CAMPANA]; ?>","<?php echo$line[CAMPANA]; ?>")' type='checkbox' data-toggle='toggle'></td>
				<?php
				}
				if ($line[ESTADO]==2){
				echo "<tr class='danger'>";
				?>
					<td> <input onchange='cambiar_vent("<?php echo$line[ID_CAMPANA]; ?>","<?php echo$line[CAMPANA]; ?>")' type='checkbox' data-toggle='toggle'></td>
				<?php
				}
				if ($line[ESTADO]==3){
      				echo "<tr class='info'>";
				?>
					<td> <input onchange='cambiar_vent("<?php echo$line[ID_CAMPANA]; ?>","<?php echo$line[CAMPANA]; ?>")' type='checkbox' data-toggle='toggle'></td>
				<?php
				}
				if ($line[ESTADO]==4){
      				echo "<tr class='warning'>
					<td><input type='checkbox' data-toggle='toggle' checked disabled></td>";
				}
        			echo "	<td><h3>".$line[CAMPANA]."</h3></td>
      				</tr>";
			}
		}
		?>
		</tbody>
  	</table>
	<div id="result"></div>
      </div>
</div>
</body>
</html>
