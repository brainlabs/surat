<?php echo $this->session->flashdata('notif'); ?>

<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8">                
                <?php
                                  echo anchor(
                                           site_url('pegawai/add'),
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="right" title="Tambah Data"'
                                          );
                 ?>
                
            </div>
            <div class="col-md-4">
                                           
                 <?php echo form_open(site_url('pegawai/search'), 'role="search" class="form"') ;?>       
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
         <?php if ($pegawais) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Nip</th>   
                
                    <th>Nama Pegawai</th>   
                
                    <th>Jabatan</th>   
                    <th>Level</th> 
                    <th>Email</th>   
                
                    <th>Passwd</th>   
                
                <th class="red header" align="right" width="160">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
                <?php $counter =1; ?> 
               <?php foreach ($pegawais as $pegawai) : ?>
              <tr>
              	<td><?php echo $number++; ?> </td>
               
               <td><?php echo $pegawai['nip']; ?></td>
               
               <td><?php echo $pegawai['nama_pegawai']; ?></td>
               
               <td><?php echo $pegawai['jabatan']; ?></td>
               
               <td><?php echo $pegawai['group']; ?></td>
               
               <td><?php echo $pegawai['email']; ?></td>
               
               <td>******</td>
               
                <td>                   
                    <?php
                                  echo anchor(
                                          site_url('pegawai/edit/' . $pegawai['id']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="left" title="Edit Data"'
                                          );
                   ?>
                   
                   <?php
                   
                                  echo anchor(
                                          site_url('pegawai/delete/' . $pegawai['id']),
                                            '<i class="glyphicon glyphicon-trash"></i>',
                                            'onclick="return confirm(\'Anda yakin..???\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="right" title="Hapus Data"'
                                          );
                    
                   ?>   
                                 
                </td>
              </tr>     
               <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
                <?php  echo notify('Data pegawai belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               pegawai
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