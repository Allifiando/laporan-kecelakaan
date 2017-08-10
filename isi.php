<!DOCTYPE html>
<html lang="en">
  <head>

    <link rel="icon" href="favicon.ico">
    <title>Formulir</title>
   
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
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">CONTACT</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div id="bodyku" class="container">

      <h2 class="text-center" style="text-decoration: underline;">Form Laporan</h2>
      <br>
      <form class="form-horizontal" method="get" action="form1.print.php">    
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Nama Pelapor</label>
          <div class="col-sm-7">
            <input type="hidden" name="idcalon">
            <input name="namapelapor" placeholder="nama anda" type="text" class="form-control" id="email">
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Nama Korban</label>
          <div class="col-sm-7">
            <input type="hidden" name="idcalon">
            <input name="namakorban" placeholder="nama korban" type="text" class="form-control" id="email">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Jenis kelamin</label>
          <div class="col-sm-10"> 
            <label class="radio-inline"><input name="jk" value="L" type="radio" name="optradio">Laki-laki</label>
            <label class="radio-inline"><input name="jk" value="P" type="radio" name="optradio">Perempuan</label>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Tanggal Kejadian</label>
          <div class="col-sm-1"> 
            <select name="tgl" class="form-control" id="sel1">
              <?php for($i=1; $i<32; $i++): ?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div class="col-sm-2"> 
            <select name="bln" class="form-control" id="sel1">
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
          <div class="col-sm-2"> 
            <select name="thn" class="form-control" id="sel1">
              <?php for($i=1980; $i<=date('Y'); $i++): ?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Lokasi Kejadian</label>
          <div class="col-sm-6"> 
            <input name="lokasi" placeholder="Lokasi kejadian" type="text" class="form-control" id="pwd">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Jenis Kecelakaan</label>
          <div class="col-sm-2"> 
            <select name="jenis" class="form-control" id="sel1">
              <option value="Tangan">Tangan</option>
              <option value="Tangan">Lengan</option>
              <option value="Kepala">Jari</option>
              <option value="Kaki">Kaki</option>
              <option value="Tangan">Tangan</option>
            </select>
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Deskripsi</label>
          <div class="col-sm-5"> 
            <textarea name="deskripsi" class="form-control" cols="" placeholder="Deskripsi kejadian" rows="5"></textarea>
          </div>
        </div>

        </div>
        
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button name="btnsubmit" type="submit" class="btn btn-success">Submit</button>
            <button name="btnreset" type="reset" id="cmd" class="btn btn-danger">Reset</button> 
          </div>
        </div>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/vendor/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/jspdf.js"></script>
    
    <script>
      $(document).ready(function(){
        $("#jikapria").hide();

        $("#jikalakilaki").click(function(){
          $("#jikapria").show();
        });

        $("#jikaperempuan").click(function(){
          $("#jikapria").hide();
        });

        var doc = new jsPDF();
        var specialElementHandlers = {
          '#editor': function (element, renderer) {
            return true;
          }
        };

        $('#cmd').click(function () {
            doc.fromHTML($('#bodyku').html(), 15, 15, {
                'width': 170,
                    'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });

      });
    </script>
  </body>
</html>