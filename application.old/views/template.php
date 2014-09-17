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
   
    <title><?php echo get_instansi(); ?></title>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/icon.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/parsley/validation.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
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
              <li class="<?php echo menu_status(array('dashboard')); ?>"><a href="<?php echo site_url('dashboard'); ?>"><i class="glyphicon glyphicon-home"></i> Dahsboard</a></li>
              <li class="<?php echo menu_status(array('agenda')); ?>"><a href="<?php echo site_url('agenda'); ?>"><i class="glyphicon glyphicon-book"></i> Agenda</a></li>            
            <li class="dropdown <?php echo menu_status(array('surat_keluar','surat_masuk')); ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-envelope"></i> Surat <b class="caret"></b></a>
              <ul class="dropdown-menu">                
                    <li><a href="<?php echo site_url('surat_keluar'); ?>">Surat Keluar</a></li>                
                    <li><a href="<?php echo site_url('surat_masuk'); ?>">Surat Masuk</a></li>                            
              </ul>
            </li>
            
            <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-paperclip"></i> Laporan <b class="caret"></b></a>
              <ul class="dropdown-menu">                
                  <li><a href="<?php echo site_url('laporan/surat_keluar'); ?>">Surat Keluar</a></li>                
                    <li><a href="<?php echo site_url('laporan/surat_masuk'); ?>">Surat Masuk</a></li>                            
              </ul>
            </li>
            
            
            <li class="dropdown <?php echo menu_status(array('ref_disposisi','ref_perihal','surat_jenis')); ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th-list"></i> Referensi <b class="caret"></b></a>
              <ul class="dropdown-menu">                
                   <li><a href="<?php echo site_url('ref_disposisi'); ?>">Disposisi</a></li>               
                   <li><a href="<?php echo site_url('ref_perihal'); ?>">Perihal</a></li> 
                   <li><a href="<?php echo site_url('surat_jenis'); ?>">Jenis Surat</a></li> 
              </ul>
            </li>
            
            <li class="dropdown <?php echo menu_status(array('instansi','pegawai')); ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-wrench"></i> Pengaturan <b class="caret"></b></a>
              <ul class="dropdown-menu">                
                   <li><a href="<?php echo site_url('instansi'); ?>">Instansi</a></li>               
                   <li><a href="<?php echo site_url('pegawai'); ?>">Pengguna</a></li>
              </ul>
            </li>
            
          </ul>
            
            <ul class="nav navbar-nav navbar-right">                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php echo $this->session->userdata('nama_pegawai');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">    
                        
                         <li><a href="<?php echo site_url('instansi'); ?>"><i class="glyphicon glyphicon-edit"></i> Ganti Password</a></li>  
                          
                         <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="glyphicon glyphicon-off"></i> Keluar</a></li>
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
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/holder.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/parsley/messages.id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/parsley/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/locales/bootstrap-datepicker.id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.file-input.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>



<?php echo $js; ?>


</body>
</html>
