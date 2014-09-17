



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('surat_jenis/' . $action),'role="form" class="form-horizontal" id="form_surat_jenis" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="nama_jenis" class="col-sm-2 control-label">Nama Jenis</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_jenis',
                                 'id'           => 'nama_jenis',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Nama Jenis',
                                 ),
                                 set_value('nama_jenis',$surat_jenis['nama_jenis'])
                           );             
                  ?>
                 <?php echo form_error('nama_jenis');?>
                </div>
              </div> <!--/ Nama Jenis -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('surat_jenis'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

