



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open(site_url('pegawai/' . $action),'role="form" class="form-horizontal" id="form_pegawai" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="nip" class="col-sm-2 control-label">Nip&nbsp;<span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nip',
                                 'id'           => 'nip',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nip',
                                 ),
                                 set_value('nip',$pegawai['nip'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('nip');?></p>
                </div>
              </div> <!--/ Nip&nbsp;<span class="required-input">*</span> -->
                          
               <div class="form-group">
                   <label for="nama_pegawai" class="col-sm-2 control-label">Nama Pegawai&nbsp;<span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_pegawai',
                                 'id'           => 'nama_pegawai',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama Pegawai',
                                 ),
                                 set_value('nama_pegawai',$pegawai['nama_pegawai'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('nama_pegawai');?></p>
                </div>
              </div> <!--/ Nama Pegawai&nbsp;<span class="required-input">*</span> -->
                          
               <div class="form-group">
                   <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jabatan',
                                 'id'           => 'jabatan',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Jabatan',
                                 ),
                                 set_value('jabatan',$pegawai['jabatan'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('jabatan');?></p>
                </div>
              </div> <!--/ Jabatan -->
              
              
              <div class="form-group">
                   <label for="jabatan" class="col-sm-2 control-label">Akses Level &nbsp;<span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php   
                  
                  echo form_dropdown(
                                'group_id',
                                 $group, 
                                 set_value('group_id',$pegawai['group_id']),
                                 'class="form-control input-sm required"');
                  
                         
                  ?>
                  <p class="help-block "><?php echo form_error('group_id');?></p>
                </div>
              </div> <!--/ Jabatan -->
              
                          
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
                                 set_value('email',$pegawai['email'])
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('email');?></p>
                </div>
              </div> <!--/ Email -->
                          
               <div class="form-group">
                   <label for="passwd" class="col-sm-2 control-label">Password&nbsp;<span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_password(
                                array(
                                 'name'         => 'passwd',
                                 'id'           => 'passwd',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => ' Password',
                                 ),
                                 set_value('passwd')
                           );             
                  ?>
                  <p class="help-block "><?php echo form_error('passwd');?></p>
                </div>
              </div> <!--/ Passwd&nbsp;<span class="required-input">*</span> -->
               
             
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('pegawai'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

