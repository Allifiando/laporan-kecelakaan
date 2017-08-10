<?php
session_start();
include('connect.php');

?>

<!DOCTYPE html>
<html>
<head>
<title>Profil</title>
<!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/navbar-fixed-top.css" rel="stylesheet">
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
</head>
<body>
	
  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="isi.php">LAPOR</a></li>
            <li><a href="history.php">HISTORY</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<h2 style="text-align: center;">History Kecelakaan</h2>
	<table width="50%" border="1">
		<tr>
			<td colspan="1" align="center">No </td>
			<td colspan="1" align="center">Nama Pelapor</td>
      <td colspan="1" align="center">Tanggal Laporan</td>
      <td colspan="1" align="center">Jenis Kecelakaan</td>
		</tr>

    <?php

    $sql = mysqli_query($connect,"SELECT * FROM simpan");
    while ($dd = mysqli_fetch_array($sql)) { ?>
      <tr>
      <td colspan="1" align="center"><?php echo $dd['id_simpan']; ?> </td>
      <td colspan="1" align="center"><?php echo $dd['nama_pelapor']; ?></td>
      <td colspan="1" align="center"><?php echo $dd['tanggal']; ?></td>
      <td colspan="1" align="center"><?php echo $dd['jenis_kecelakaan']; ?></td>
    </tr>

    <?php

    }
    ?>
		
  </table>
</body>
</html>