
<?php echo $this->session->flashdata('notif'); ?>
<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8">                
                <?php
                                  echo anchor(
                                           site_url('ref_perihal/add'),
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            'class="btn btn-success btn-sm"'
                                          );
                 ?>
                
            </div>
            <div class="col-md-4">
                                           
                 <?php echo form_open(site_url('ref_perihal/search'), 'role="search" class="form"') ;?>       
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
         <?php if ($ref_perihals) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Perihal</th>   
                
                    <th>Diterbitkan Kepada</th>   
                
                    <th>Pengelola Surat</th>   
                
                <th class="red header" align="right" width="160">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
                
               <?php foreach ($ref_perihals as $ref_perihal) : ?>
              <tr>
              	<td><?php echo $number++; ?> </td>
               
               <td><?php echo $ref_perihal['perihal']; ?></td>
               
               <td><?php echo $ref_perihal['diterbitkan_kepada']; ?></td>
               
               <td><?php echo $ref_perihal['pengelola_surat']; ?></td>
               
                <td>                   
                    <?php
                                  echo anchor(
                                          site_url('ref_perihal/edit/' . $ref_perihal['perihal_id']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('ref_perihal/delete/' . $ref_perihal['perihal_id']),
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
                <?php  echo notify('Data ref_perihal belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               ref_perihal
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