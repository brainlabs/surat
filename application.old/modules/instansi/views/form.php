

<?php echo $this->session->flashdata('notif'); ?>

<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open_multipart(site_url($action),'role="form" class="form-horizontal" id="form_instansi" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="nama_instansi" class="col-sm-2 control-label">Nama Instansi&nbsp;<span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_instansi',
                                 'id'           => 'nama_instansi',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama Instansi',
                                 ),
                                 set_value('nama_instansi',$instansi['nama_instansi'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('nama_instansi');?></p>
                </div>
              </div> <!--/ Nama Instansi&nbsp;<span class="required-input">*</span> -->
                          
               <div class="form-group">
                   <label for="alamat_instansi" class="col-sm-2 control-label">Alamat Instansi&nbsp;<span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_textarea(
                            array(
                                'id'            =>'alamat_instansi',
                                'name'          =>'alamat_instansi',
                                'rows'          =>'3',
                                'class'         =>'form-control input-sm  required',
                                'placeholder'   =>'Alamat Instansi',
                                ),
                            set_value('alamat_instansi',$instansi['alamat_instansi'])                           
                            );             
                  ?>
                  <p class="help-block "><?php echo form_error('alamat_instansi');?></p>
                </div>
              </div> <!--/ Alamat Instansi&nbsp;<span class="required-input">*</span> -->
                          
               <div class="form-group">
                   <label for="nama_pimpinan" class="col-sm-2 control-label">Nama Pimpinan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_pimpinan',
                                 'id'           => 'nama_pimpinan',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Nama Pimpinan',
                                 ),
                                 set_value('nama_pimpinan',$instansi['nama_pimpinan'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('nama_pimpinan');?></p>
                </div>
              </div> <!--/ Nama Pimpinan -->
                          
               <div class="form-group">
                   <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'email',
                                 'id'           => 'email',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Email',
                                 ),
                                 set_value('email',$instansi['email'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('email');?></p>
                </div>
              </div> <!--/ Email -->
                          
               <div class="form-group">
                   <label for="website" class="col-sm-2 control-label">Website</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'website',
                                 'id'           => 'website',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Website',
                                 ),
                                 set_value('website',$instansi['website'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('website');?></p>
                </div>
              </div> <!--/ Website -->
                          
               <div class="form-group">
                   <label for="logo" class="col-sm-2 control-label">Logo</label>
                <div class="col-sm-6">                                   
                 
                    <?php                  
                   echo form_upload(
                                array(
                                 'name'         => 'logo',
                                 'id'           => 'logo',                       
                                 'style'        => 'left: -85.5px; top: 19.6px;',
                                 'title'        => 'Pilih logo',
                                 'class'        => 'btn btn-info'
                                 )                                
                           );             
                  
                   echo form_hidden('logo_old',$instansi['logo'])
                   
                   ?>
                </div>
                   
              </div> <!--/ Logo -->
              <div class="form-group">
                 
                  
                   <div class="col-sm-3 col-sm-offset-2">   
                   <img src="<?php echo base_url('assets/logo/' . $instansi['logo']); ?>"/>
                   </div>
                          
                 
              </div>
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Update </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

