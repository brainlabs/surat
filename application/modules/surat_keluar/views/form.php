



<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         <?php echo form_open_multipart(site_url('surat_keluar/' . $action),'role="form" class="form-horizontal" id="form_surat_keluar" parsley-validate'); ?>
                
         
                       
               <div class="form-group">
                   <label for="jenis_surat_id" class="col-sm-2 control-label">Jenis Surat <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'jenis_surat_id',
                           $jenis_surat,  
                           set_value('jenis_surat_id',$surat_keluar['jenis_surat_id']),
                           'class="form-control input-sm  required"  id="jenis_surat_id"'
                           );             
                  ?>
                 <?php echo form_error('jenis_surat_id');?>
                </div>
              </div> <!--/ Jenis Surat -->
                          
               <div class="form-group">
                   <label for="nomor_surat" class="col-sm-2 control-label">Nomor Surat <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nomor_surat',
                                 'id'           => 'nomor_surat',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nomor Surat',
                                 ),
                                 set_value('nomor_surat',$surat_keluar['nomor_surat'])
                           );             
                  ?>
                 <?php echo form_error('nomor_surat');?>
                </div>
              </div> <!--/ Nomor Surat -->
                          
               <div class="form-group">
                   <label for="tanggal_surat" class="col-sm-2 control-label">Tanggal Surat <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tanggal_surat',
                                 'id'           => 'tanggal_surat',                       
                                 'class'        => 'form-control input-sm tanggal required',
                                 'placeholder'  => 'Tanggal Surat',
                                 ),
                                 set_value('tanggal_surat',$surat_keluar['tanggal_surat'])
                           );             
                  ?>
                 <?php echo form_error('tanggal_surat');?>
                </div>
              </div> <!--/ Tanggal Surat -->
                          
               <div class="form-group">
                   <label for="perihal_id" class="col-sm-2 control-label">Perihal <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'perihal_id',
                           $perihal,  
                           set_value('perihal_id',$surat_keluar['perihal_id']),
                           'class="form-control input-sm  required"  id="perihal_id"'
                           );             
                  ?>
                 <?php echo form_error('perihal_id');?>
                </div>
              </div> <!--/ Perihal -->
                          
               <div class="form-group">
                   <label for="tujuan" class="col-sm-2 control-label">Tujuan <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tujuan',
                                 'id'           => 'tujuan',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Tujuan',
                                 ),
                                 set_value('tujuan',$surat_keluar['tujuan'])
                           );             
                  ?>
                 <?php echo form_error('tujuan');?>
                </div>
              </div> <!--/ Tujuan -->
                          
               <div class="form-group">
                   <label for="penanda_tangan" class="col-sm-2 control-label">Penanda Tangan <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'penanda_tangan',
                                 'id'           => 'penanda_tangan',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Penanda Tangan',
                                 ),
                                 set_value('penanda_tangan',$surat_keluar['penanda_tangan'])
                           );             
                  ?>
                 <?php echo form_error('penanda_tangan');?>
                </div>
              </div> <!--/ Penanda Tangan -->
                          
               <div class="form-group">
                   <label for="catatan" class="col-sm-2 control-label">Catatan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_textarea(
                            array(
                                'id'            =>'catatan',
                                'name'          =>'catatan',
                                'rows'           => 3,
                                'class'         =>'form-control input-sm ',
                                'placeholder'   =>'Catatan',
                                
                                ),
                            set_value('catatan',$surat_keluar['catatan'])                           
                            );             
                  ?>
                 <?php echo form_error('catatan');?>
                </div>
              </div> <!--/ Catatan -->
                   
              <div class="form-group">
                   <div class="col-sm-6 col-sm-offset-2">
                       
                   <?php
                            echo $surat_keluar['file_surat'];
                   ?>
                   </div>
              </div>
               <div class="form-group">
                  
                   <label for="file_surat" class="col-sm-2 control-label">File Surat</label>
                <div class="col-sm-3">       
                    
                 
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
                  
                   echo form_hidden('file_old',set_value('file_old',$surat_keluar['file_surat']) )
                   
                   ?>
                 
                 <?php echo form_error('file_surat');?>
                </div>
                   
                   
              </div> <!--/ File Surat -->
               
            
              
              <div class="form-group well">
                <div class="col-sm-offset-2 col-sm-4">                    
                    <a href="<?php echo site_url('surat_keluar'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a> 
                    <button type="submit" class="btn btn-primary" name="post"><i class="glyphicon glyphicon-floppy-save"></i> Simpan </button>                  
                </div>                
              </div>
               
           
           
         <?php echo form_close(); ?>    
      </div>       
</div><!--/ Panel -->

