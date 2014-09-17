



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('ref_perihal/' . $action),'role="form" class="form-horizontal" id="form_ref_perihal" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="perihal" class="col-sm-2 control-label">Perihal</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'perihal',
                                 'id'           => 'perihal',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Perihal',
                                 ),
                                 set_value('perihal',$ref_perihal['perihal'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('perihal');?></p>
                </div>
              </div> <!--/ Perihal -->
                          
               <div class="form-group">
                   <label for="diterbitkan_kepada" class="col-sm-2 control-label">Diterbitkan Kepada</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'diterbitkan_kepada',
                                 'id'           => 'diterbitkan_kepada',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Diterbitkan Kepada',
                                 ),
                                 set_value('diterbitkan_kepada',$ref_perihal['diterbitkan_kepada'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('diterbitkan_kepada');?></p>
                </div>
              </div> <!--/ Diterbitkan Kepada -->
                          
               <div class="form-group">
                   <label for="pengelola_surat" class="col-sm-2 control-label">Pengelola Surat</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'pengelola_surat',
                                 'id'           => 'pengelola_surat',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Pengelola Surat',
                                 ),
                                 set_value('pengelola_surat',$ref_perihal['pengelola_surat'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('pengelola_surat');?></p>
                </div>
              </div> <!--/ Pengelola Surat -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('ref_perihal'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

