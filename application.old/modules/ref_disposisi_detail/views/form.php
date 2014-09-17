



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('ref_disposisi_detail/' . $action),'role="form" class="form-horizontal" id="form_ref_disposisi_detail" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="disposisi_id" class="col-sm-2 control-label">Disposisi</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'disposisi_id',
                           $disposisi,  
                           set_value('disposisi_id',$ref_disposisi_detail['disposisi_id']),
                           'class="form-control input-sm  required"  id="disposisi_id"'
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('disposisi_id');?></p>
                </div>
              </div> <!--/ Disposisi -->
                          
               <div class="form-group">
                   <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'deskripsi',
                                 'id'           => 'deskripsi',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Deskripsi',
                                 ),
                                 set_value('deskripsi',$ref_disposisi_detail['deskripsi'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('deskripsi');?></p>
                </div>
              </div> <!--/ Deskripsi -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('ref_disposisi_detail'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

