<?php echo $this->session->flashdata('notif'); ?>
<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8">                
                <?php
                                  echo anchor(
                                           site_url('surat_masuk/add'),
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            'class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="Tambah Data"'
                                          );
                 ?>
                
            </div>
            <div class="col-md-4">
                                           
                 <?php echo form_open(site_url('surat_masuk/search'), 'role="search" class="form"') ;?>       
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
         <?php if ($surat_masuks) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Skpd Pengirim</th>   
                
                    <th>Tanggal Surat</th>   
                
                    <th>Nomor Surat</th>   
                
                    <th>Perihal</th>   
                
                    <th>Nomor Agenda</th>   
                
                    <th>Tanggal Diterima</th>   
                
                    <th>Disposisi</th>   
                
              
                
                <th class="red header" align="right" width="160">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
                <?php $counter =1; ?> 
               <?php foreach ($surat_masuks as $surat_masuk) : ?>
              <tr>
              	<td><?php echo $counter++; ?> </td>
               
               <td><?php echo $surat_masuk['skpd_pengirim']; ?></td>
               
               <td><?php echo date('d-m-Y',  strtotime($surat_masuk['tanggal_surat'])); ?></td>
               
               <td><?php echo $surat_masuk['nomor_surat']; ?></td>
               
               <td><?php echo $surat_masuk['perihal']; ?></td>
               
               <td><?php echo $surat_masuk['nomor_agenda']; ?></td>
               
               <td><?php echo date('d-m-Y',  strtotime($surat_masuk['tanggal_diterima'])); ?></td>
               
               <td><?php echo $surat_masuk['disposisi']; ?></td>
               
               
               
                <td>  
                    
                    <button class="btn btn-sm  btn-warning" data-toggle="modal" data-target=".surat-keluar" nilai="<?php echo $surat_masuk['surat_masuk_id'] ?>" id="detail" data-tooltip="tooltip" data-placement="left" title="Lihat Detail">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </button>
                    
                    <?php
                                  echo anchor(
                                          site_url('surat_masuk/edit/' . $surat_masuk['surat_masuk_id']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit Data"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('surat_masuk/delete/' . $surat_masuk['surat_masuk_id']),
                                            '<i class="glyphicon glyphicon-trash"></i>',
                                            'onclick="return confirm(\'Anda yakin..???\');" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data"'
                                          );
                   ?>   
                                 
                </td>
              </tr>     
               <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
                <?php  echo notify('Data surat_masuk belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               surat_masuk
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


<!--/ Modal -->

<div class="modal fade surat-keluar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mymodal">
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