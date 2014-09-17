

<div class="modal fade" id="ajax-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Ganti Password</h4>
      </div>
        <div class="modal-body">
            <img src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>" id="loader" style="display:none;"/>
            <?php echo form_open('', 'class="form" id="form-ganti-password"') ?>
           
            <div class="form-group">
               <label for="old">Password Lama</label>    
               <?php
               
               echo form_password(
                       
                       array(
                           'name'   =>'old',
                           'id'     => 'old',
                           'class'  =>'form-control input-sm required',
                           'placeholder' =>'Password lama'
                       )
                       );
               
               ?>
               
            </div>
       
            <div class="form-group">
               <label for="old_password">Password Lama</label>    
               <?php
               
               echo form_password(
                       
                       array(
                           'name'   =>'new',
                           'id'     => 'new',
                           'class'  =>'form-control input-sm required',
                           'placeholder' =>'Password Baru'
                       )
                       );
               
               ?>
            </div>
            
            <div class="form-group">
               <label for="confirm">Konfirmasi Password</label>    
               <?php
               
               echo form_password(
                       
                       array(
                           'name'   =>'confirm',
                           'id'     => 'confirm',
                           'class'  =>'form-control input-sm required',
                           'placeholder' => 'Konfirmasi Password',
                           'parsley-equalto'=> '#new'
                       )
                       );
               
               ?>
            </div>
             <?php echo form_close(); ?>
            
            <div id="msg">
                
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="kirim-data">Kirim</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            
        </div>
        
    </div>
  </div>
</div>