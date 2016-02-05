<!DOCTYPE html>
<html lang="en">
<head>        
    <title>Monitoring AP2T</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	   
	   
    <link rel="icon" type="image/ico" href="<?php echo base_url();?>assets/html/img/favicon.ico"/>
		   
    <link href="<?php echo base_url();?>assets/html/css/stylesheets.css" rel="stylesheet" type="text/css" />        
   
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/plugins/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/plugins/jquery/jquery-ui.min.js'></script>   
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/plugins/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/plugins/jquery/globalize.js'></script>    
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/plugins/bootstrap/bootstrap.min.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/plugins/uniform/jquery.uniform.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/plugins/datatables/jquery.dataTables.min.js'></script>
    
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/plugins.js'></script>    
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/actions.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/html/js/settings.js'></script>
</head>
<body class="bg-img-num1"> 
    <?php      
        //header("refresh:3;chart1");

        //Array Hari
        $array_hari = array(1=>'Senin',"Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
        $hari = $array_hari[date("N")];

        //Format Tanggal
        $tanggal = date ("j");

        //Array Bulan
        $array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
        $bulan = $array_bulan[date("n")];

        //Format Tahun
        $tahun = date("Y");
        
        //Format Jam
        //$jam=date("H:i:s"); 

        if ($data){
            foreach($data->result() as $rowj){       
                $jam = "LAST UPDATED ". $rowj->JAM;                                                                     
                break;                                                                                       
            }
            $interval=180000;

        } else {
            $jam = "Under scheduling";
            $interval=60000;
        }
                        
        //Menampilkan hari dan tanggal
        $judul = "MONITORING PROSES PERHITUNGAN TAGIHAN LISTRIK, ". $hari ." ". $tanggal ." ". $bulan ." ". $tahun.". ". $jam; 
    ?>

<script type='text/javascript'>

setTimeout(function () {
   window.location.href= "<?php echo base_url();?>index.php/chart2"; 
},<?php echo $interval; ?>);

</script>


    <div class="container">        
        <div class="row">                   
            <div class="col-md-12">
                
                <nav class="navbar brb" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-reorder"></span>                            
                        </button>                                                
                        <a class="navbar-brand" href="<?php echo base_url();?>index.php/home"><img src="<?php echo base_url();?>assets/html/img/logo.png"/></a>                                                                                     
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">                                     
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?php echo base_url();?>index.php/prabayar1">
                                    <span class="icon-copy"></span> <?php echo $judul; ?>
                                </a>
                            </li>                                                                  
						</ul>
                    </div>                   
                </nav>                 

            </div>           
        </div>     
		
        <div class="row">
   
            <div class="col-md-12">
                
                <div class="block block-fill-white">
                    <div class="content">                    
                                
						<?php 
                            if ($data){
                                include 'vlist_data4.php'; 
                            } else {
                                include 'vlist_data5.php'; 
                            }

                        ?>						                        					
                        
                    </div>

                </div>

            </div>
 

        </div>
         

    </div>
 
</body>
</html>