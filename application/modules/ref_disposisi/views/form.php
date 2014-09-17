



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('ref_disposisi/' . $action),'role="form" class="form-horizontal" id="form_ref_disposisi" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="disposisi" class="col-sm-2 control-label">Disposisi</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'disposisi',
                                 'id'           => 'disposisi',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Disposisi',
                                 ),
                                 set_value('disposisi',$ref_disposisi['disposisi'])
                           );             
                  ?>
                  <?php echo form_error('disposisi');?>
                </div>
              </div> <!--/ Disposisi -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('ref_disposisi'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

