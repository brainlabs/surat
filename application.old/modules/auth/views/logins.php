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
            <a class="navbar-brand" href=""><i class="glyphicon glyphicon-home"></i> Brain Labs</a>
        </div>
        
      </div>
    </div>
 
   
    <div class="container">
        <div class="col-sm-5 col-centered">            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-log-in"></i> <span class="required-input"></span>
                </div>
                <div class="panel-body">
                    <form role="form" id="form_login" name="form_login">
                        <div class="form-group">
                          <label for="username">Username / NIP </label>
                          <input type="input" class="form-control required" id="username" placeholder="Enter Username / NIP" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label for="passwd">Password</label>
                          <input type="password" class="form-control required" id="passwd" placeholder="Password" autocomplete="off">
                        </div>
                        
                       <button type="button" class="btn btn-primary " id="login">Login</button>
                    </form>
                </div>
            </div>              
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/login.js"></script>






</body>
</html>
