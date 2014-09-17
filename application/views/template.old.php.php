<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--/ No cache -->
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
   
    <title>Home</title>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icon.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/parsley/validation.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
</head>

<body>
  
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>">Brain Labs</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('dashboard'); ?>">Dahsboard</a></li>
            
            <li><a href="<?php echo site_url('agenda'); ?>">Agenda</a></li>
            
      
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Surat <b class="caret"></b></a>
              <ul class="dropdown-menu">                
                    <li><a href="<?php echo site_url('surat_keluar'); ?>">Surat Keluar</a></li>                
                    <li><a href="<?php echo site_url('surat_masuk'); ?>">Surat Masuk</a></li>                            
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
              <ul class="dropdown-menu">                
                    <li><a href="<?php echo site_url('laporan'); ?>">Surat Keluar</a></li>                
                    <li><a href="<?php echo site_url('laporan'); ?>">Surat Masuk</a></li>                            
              </ul>
            </li>
            
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Referensi <b class="caret"></b></a>
              <ul class="dropdown-menu">                
                   <li><a href="<?php echo site_url('ref_disposisi'); ?>">Disposisi</a></li>               
                   <li><a href="<?php echo site_url('ref_perihal'); ?>">Perihal</a></li> 
                    
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Content <b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                    <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                
                    <li><a href="<?php echo site_url('pegawai'); ?>">Pegawai</a></li>
                
                    <li><a href="<?php echo site_url('ref_disposisi'); ?>">Ref Disposisi</a></li>
                
                    <li><a href="<?php echo site_url('ref_disposisi_detail'); ?>">Ref Disposisi Detail</a></li>
                
                    <li><a href="<?php echo site_url('ref_perihal'); ?>">Ref Perihal</a></li>
                
                    <li><a href="<?php echo site_url('surat_jenis'); ?>">Surat Jenis</a></li>
                
                    <li><a href="<?php echo site_url('surat_keluar'); ?>">Surat Keluar</a></li>
                
                    <li><a href="<?php echo site_url('surat_masuk'); ?>">Surat Masuk</a></li>
                            
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   
 
   
    <div class="container">
        <div class="row">
            
                <?php echo $content; ?>
            
        </div>
       
       
    </div><!--/ Content -->
   
     

  




<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/html5shiv.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/holder.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/parsley/messages.id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/parsley/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/locales/bootstrap-datepicker.id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.file-input.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    
</script>


<?php echo $js; ?>


</body>
</html>
