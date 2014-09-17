<?php echo $this->session->flashdata('notif'); ?>
<section class="panel panel-default">
    
    
    
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8">                
                <?php
                                  echo anchor(
                                           site_url('ref_disposisi/add'),
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            'class="btn btn-success btn-sm"'
                                          );
                 ?>
                
            </div>
            <div class="col-md-4">
                                           
                 <?php echo form_open(site_url('ref_disposisi/search'), 'role="search" class="form"') ;?>       
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
         <?php if ($ref_disposisis) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Disposisi</th>   
                
                <th class="red header" align="right" width="160">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
                
               <?php foreach ($ref_disposisis as $ref_disposisi) : ?>
              <tr>
              	<td><?php echo $number++; ?> </td>
               
               <td><?php echo $ref_disposisi['disposisi']; ?></td>
               
                <td>                   
                    <?php
                                  echo anchor(
                                          site_url('ref_disposisi/edit/' . $ref_disposisi['disposisi_id']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('ref_disposisi/delete/' . $ref_disposisi['disposisi_id']),
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
                <?php  echo notify('Data ref_disposisi belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               ref disposisi
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