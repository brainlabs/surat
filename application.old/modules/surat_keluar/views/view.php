<?php echo $this->session->flashdata('notif'); ?>
<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8">                
                <?php
                                  echo anchor(
                                           site_url('surat_keluar/add'),
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            'class="btn btn-success btn-sm"'
                                          );
                 ?>
                
            </div>
            <div class="col-md-4">
                                           
                 <?php echo form_open(site_url('surat_keluar/search'), 'role="search" class="form"') ;?>       
                           <div class="input-group pull-right">                      
                                 <input type="text" class="form-control input-sm" placeholder="Cari data" name="q" autocomplete="off"> 
                                 <span class="input-group-btn">
                                      <button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i> Cari</button>
                                 </span>
                           </div>
                           
               </form> 
                <?php echo form_close(); ?>
            </div>
        </div>
    </header>
    
    
    <div class="panel-body">
         <?php if ($surat_keluars) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Jenis Surat</th>   
                
                    <th>Nomor Surat</th>   
                
                    <th>Tanggal Surat</th>   
                
                    <th>Perihal</th>   
                
                    <th>Tujuan</th>   
                
                    <th>Penanda Tangan</th>   
                
        
                    <!--
                    <th>File Surat</th>   
                    -->
                <th class="red header" align="right">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
               
               <?php foreach ($surat_keluars as $surat_keluar) : ?>
              <tr>
              	<td><?php echo $number++; ?> </td>
               
               <td><?php echo $surat_keluar['nama_jenis']; ?></td>
               
               <td><?php echo $surat_keluar['nomor_surat']; ?></td>
               
               <td><?php echo date('d-m-Y',  strtotime($surat_keluar['tanggal_surat'])); ?></td>
               
               <td><?php echo $surat_keluar['perihal']; ?></td>
               
               <td><?php echo $surat_keluar['tujuan']; ?></td>
               
               <td><?php echo $surat_keluar['penanda_tangan']; ?></td>
               
     
               <!--
               <td><?php echo $surat_keluar['file_surat']; ?></td>
               -->
                <td> 
                    
                    <button class="btn btn-sm  btn-warning" data-toggle="modal" data-target=".surat-keluar" nilai="<?php echo $surat_keluar['surat_keluar_id'];?>" id="detail_keluar">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </button>
                    
                    <?php
                                  echo anchor(
                                          site_url('surat_keluar/edit/' . $surat_keluar['surat_keluar_id']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('surat_keluar/delete/' . $surat_keluar['surat_keluar_id']),
                                            '<i class="glyphicon glyphicon-trash"></i>',
                                            'onclick="return confirm(\'Anda yakin..???\');" class="btn btn-sm btn-danger"'
                                          );
                   ?>
                    
                   
                                 
                </td>
              </tr>     
               <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
                <?php  echo notify('Data surat_keluar belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               surat_keluar
               <span class="label label-info">
                    <?php echo $total; ?>
               </span>
           </div>  
           <div class="col-md-9">
                 <?php echo $pagination; ?>
           </div>
        </div>
    </div>
</section>


<div class="modal fade surat-keluar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
        
        <div class="modal-body">
          ...
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
        
    </div>
  </div>
</div>