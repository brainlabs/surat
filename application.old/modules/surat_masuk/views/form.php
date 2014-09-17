
<?php echo validation_errors();?>


<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open_multipart(site_url($action),'role="form" class="form-horizontal" id="form_surat_masuk" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="skpd_pengirim" class="col-sm-2 control-label">Skpd Pengirim <span class="required-input">*</span></label>
                <div class="col-sm-3">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'skpd_pengirim',
                                 'id'           => 'skpd_pengirim',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Skpd Pengirim',
                                 ),
                                 set_value('skpd_pengirim',$surat_masuk['skpd_pengirim'])
                           );             
                  ?>
                 <?php echo form_error('skpd_pengirim');?>
                </div>
              </div> <!--/ Skpd Pengirim -->
                          
               <div class="form-group">
                   <label for="tanggal_surat" class="col-sm-2 control-label">Tanggal Surat <span class="required-input">*</span></label>
                <div class="col-sm-2">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tanggal_surat',
                                 'id'           => 'tanggal_surat',                       
                                 'class'        => 'form-control input-sm  required tanggal',
                                 'placeholder'  => 'Tanggal Surat',
                                 ),
                                 set_value('tanggal_surat',$surat_masuk['tanggal_surat'])
                           );             
                  ?>
                 <?php echo form_error('tanggal_surat');?>
                </div>
              </div> <!--/ Tanggal Surat -->
                          
               <div class="form-group">
                   <label for="nomor_surat" class="col-sm-2 control-label">Nomor Surat <span class="required-input">*</span></label>
                <div class="col-sm-2">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nomor_surat',
                                 'id'           => 'nomor_surat',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nomor Surat',
                                 ),
                                 set_value('nomor_surat',$surat_masuk['nomor_surat'])
                           );             
                  ?>
                 <?php echo form_error('nomor_surat');?>
                </div>
              </div> <!--/ Nomor Surat -->
                          
               <div class="form-group">
                   <label for="perihal_id" class="col-sm-2 control-label">Perihal <span class="required-input">*</span></label>
                <div class="col-sm-3">                                   
                  <?php                  
                   echo form_dropdown(
                           'perihal_id',
                           $perihal,  
                           set_value('perihal_id',$surat_masuk['perihal_id']),
                           'class="input-sm form-control  required"  id="perihal_id"'
                           );             
                  ?>
                 <?php echo form_error('perihal_id');?>
                </div>
                  
              </div> <!--/ Perihal -->
                          
               <div class="form-group">
                   <label for="nomor_agenda" class="col-sm-2 control-label">Nomor Agenda <span class="required-input">*</span></label>
                <div class="col-sm-2">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nomor_agenda',
                                 'id'           => 'nomor_agenda',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nomor Agenda',
                                 ),
                                 set_value('nomor_agenda',$surat_masuk['nomor_agenda'])
                           );             
                  ?>
                 <?php echo form_error('nomor_agenda');?>
                </div>
              </div> <!--/ Nomor Agenda -->
                          
               <div class="form-group">
                   <label for="tanggal_diterima" class="col-sm-2 control-label">Tanggal Diterima <span class="required-input">*</span></label>
                <div class="col-sm-2">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tanggal_diterima',
                                 'id'           => 'tanggal_diterima',                       
                                 'class'        => 'form-control input-sm tanggal required',
                                 'placeholder'  => 'Tanggal Diterima',
                                 ),
                                 set_value('tanggal_diterima',$surat_masuk['tanggal_diterima'])
                           );             
                  ?>
                 <?php echo form_error('tanggal_diterima');?>
                </div>
              </div> <!--/ Tanggal Diterima -->
                          
               <div class="form-group">
                   <label for="disposisi_id" class="col-sm-2 control-label">Disposisi <span class="required-input">*</span></label>
                <div class="col-sm-3">                                   
                  <?php                  
                   echo form_dropdown(
                           'disposisi_id',
                           $disposisi,  
                           set_value('disposisi_id',$surat_masuk['disposisi_id']),
                           'class="input-sm form-control  required"  id="disposisi_id"'
                           );             
                  ?>
                 <?php echo form_error('disposisi_id');?>
                </div>
              </div> <!--/ Disposisi -->
                  
              <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2" id="disposisi-data">      
                    
                  </div>
              </div>
               <div class="form-group">
                   <label for="catatan" class="col-sm-2 control-label">Catatan <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_textarea(
                            array(
                                'id'            =>'catatan',
                                'name'          =>'catatan',
                                'cols'          =>'catatan',
                                'class'         =>'form-control input-sm  required',
                                'placeholder'   =>'Catatan',
                                'rows'          => 3
                                ),
                            set_value('catatan',$surat_masuk['catatan'])                           
                            );             
                  ?>
                 <?php echo form_error('catatan');?>
                </div>
              </div> <!--/ Catatan -->
               
                <div class="form-group">
                   <div class="col-sm-6 col-sm-offset-2">
                       
                  <?php
                        echo $surat_masuk['file_surat'];
                   ?>
                   </div>
              </div>
              
              <div class="form-group">
                   <label for="file" class="col-sm-2 control-label">File (hasil Scan surat)</label>
                <div class="col-sm-2">                                   
                  <?php                     
                  
                   echo form_upload(
                                array(
                                 'name'         => 'file_surat',
                                 'id'           => 'file_surat',                       
                                 'style'        => 'left: -85.5px; top: 19.6px;',
                                 'title'        => 'Pilih File',
                                 'class'        => 'btn btn-info'
                                 )                             
                           );
                    echo form_hidden('file_old',$surat_masuk['file_surat'] )
                   
                  ?>
                 <?php echo form_error('file');?>
                </div>
               
              </div> <!--/ file -->
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('surat_masuk'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

