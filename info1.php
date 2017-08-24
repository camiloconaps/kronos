<?php
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div >
<section class="content-header">
      <h1>
        Dashboard ICC Apolo
      </h1>
      <ol class="breadcrumb">
        <li><a href="control.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Info 1</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">

	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Cambios de estado</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Chat Sala</th>
                  <th>Estado</th>
                  <th>Fecha Modificaci&oacute;on</th>
                  <th>Encargado</th>
                </tr>
                </thead>
                <tbody>
		<?php
                $sql = "SELECT B.CAMPANA,C.DESCRIPCION,A.FECHA_MOD,A.USER_ID
                        FROM Logs A
                        INNER JOIN Campanas B ON A.CAMP_ID = B.ID_CAMPANA
                        INNER JOIN Estados C ON  A.ESTADO_ID = C.ID_ESTADO";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                	while($line = $result->fetch_assoc()) {
                		echo "<tr>
					<td>".$line[CAMPANA]."</td>
                                        <td>".$line[DESCRIPCION]."</td>
                                        <td>".$line[FECHA_MOD]."</td>
                                        <td>".$line[USER_ID]."</td>
                		</tr>";
			}
		}
		?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Chat Sala</th>
                  <th>Estado</th>
                  <th>Fecha Modificaci&oacute;on</th>
                  <th>Encargado</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 	</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>
