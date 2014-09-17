


<?php echo $this->session->flashdata('notif'); ?>

<div class="well well-sm">
    <div class="row">
        <?php 
            echo form_open(site_url('laporan/filter_surat_masuk'), 'class="form" role="form" id="filter"' );
        ?>
         <div class="form-group">
            <label for="start" class="col-sm-2">Dari Tanggal</label>
            <div class="col-sm-2">
            <?php 
                echo form_input(
                        array(
                            'name'      => 'start',
                            'id'        => 'start',
                            'class'     => 'form-control input-sm tanggal required'
                        )
                        );
                
            ?>
            </div>
            <label for="end" class="col-sm-2">Sampai Tanggal</label>
            <div class="col-sm-2">
            <?php 
                echo form_input(
                        array(
                            'name'      => 'end',
                            'id'        => 'end',
                            'class'     => 'form-control input-sm tanggal required'
                        )
                        );
                
            ?>
            </div>
            
            <div class="col-sm-2">
                <button class="btn btn-sm btn-primary" type="submit">Tampilkan</button>
            </div>
            
        </div>
        
        <?php echo form_close(); ?>
    </div>
</div>

<section class="panel panel-default">
    <header class="panel-heading">
       Laporan Surat Masuk
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
          
               <?php foreach ($surat_masuks as $surat_masuk) : ?>
              <tr>
              	<td><?php echo $number++; ?> </td>
               
               <td><?php echo $surat_masuk['skpd_pengirim']; ?></td>
               
               <td><?php echo $surat_masuk['tanggal_surat']; ?></td>
               
               <td><?php echo $surat_masuk['nomor_surat']; ?></td>
               
               <td><?php echo $surat_masuk['perihal']; ?></td>
               
               <td><?php echo $surat_masuk['nomor_agenda']; ?></td>
               
               <td><?php echo $surat_masuk['tanggal_diterima']; ?></td>
               
               <td><?php echo $surat_masuk['disposisi']; ?></td>
               
               
               
                <td>                   
                    <button class="btn btn-sm  btn-warning" data-toggle="modal" data-target=".surat-keluar" nilai="<?php echo $surat_masuk['surat_masuk_id'] ?>" id="detail">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </button>
                                 
                </td>
              </tr>     
               <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
                <?php  echo notify('Data surat masuk tidak ditemukan','info');?>
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


<?php 

$this->load->view('laporan/modal');

?>
