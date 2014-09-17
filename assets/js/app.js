
$(document).ready(function (){
       
    $('input[type=file]').bootstrapFileInput();
    //$('.file-inputs').bootstrapFileInput();
    
         $('body').on('focus',".tanggal", function(){                     
                      $(this).datepicker({
                            format: " yyyy-mm-dd",
                            viewMode: "year",
                            autoclose:true,
                            todayHighlight:true,
                            language:'id',
                            calendarWeeks:false,
                            startView:0,
							todayBtn: "linked"
                     });
               }); 
               
});



// Surat Masuk

$(document).ready(function (){
    
    $('#perihal_id').change(function (){
        //var nilai = $(this).value();
         $.ajax({
		url: base_url + 'ajax/ambil_perihal',
		type: 'POST',
		data: {perihal : $('#perihal_id').val()},
		cache: false,
		dataType: 'json',
		//processData: false, // Don't process the files
		//contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		success: function(data, textStatus, jqXHR)
		{
                   
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
		// Handle errors here
                    console.log('ERRORS: ' + textStatus);
		// STOP LOADING SPINNER
		}
            });
    });
    
     $('#disposisi_id').change(function (){
        
        $.ajax({
		url: base_url + 'ajax/ambil_disposisi',
		type: 'POST',
		data: {disposisi : $('#disposisi_id').val()},
		cache: false,
		dataType: 'html',
		//processData: false, // Don't process the files
		//contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		success: function(data, textStatus, jqXHR)
		{
                   $('#disposisi-data').html(data);
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
		// Handle errors here
                    console.log('ERRORS: ' + textStatus);
		// STOP LOADING SPINNER
		}
            });
        
    });
    
    // Detail Surat Masuk
    $("#detail").click(function (){
        $.ajax({
		url: base_url + 'ajax/detail_surat_masuk',
		type: 'POST',
		data: {nilai : $('#detail').attr('nilai')},
		cache: false,
		dataType: 'html',
		//processData: false, // Don't process the files
		//contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		success: function(data, textStatus, jqXHR)
		{
                   $('.modal-body').html('');
                   $('.modal-body').html(data);
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
		// Handle errors here
                    console.log('ERRORS: ' + textStatus);
		// STOP LOADING SPINNER
		}
            });
    });
    
    
     $("#detail_keluar").click(function (){
        $.ajax({
		url: base_url + 'ajax/detail_surat_keluar',
		type: 'POST',
		data: {nilai : $('#detail_keluar').attr('nilai')},
		cache: false,
		dataType: 'html',
		//processData: false, // Don't process the files
		//contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		success: function(data, textStatus, jqXHR)
		{
                   $('.modal-body').html('');
                   $('.modal-body').html(data);
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
		// Handle errors here
                    console.log('ERRORS: ' + textStatus);
		// STOP LOADING SPINNER
		}
            });
    });

            







//Modal Change Password



       // $('[data-toggle="modal-ajax"]').on('click',function(e){
       $('body').on('click','[data-toggle="modal-ajax"]', function(e){ 
                        $('#ajax-modal').remove();
                        e.preventDefault();
                         
                        var $this = $(this)
                         , $remote = $this.data('remote') || $this.attr('href');
                        
                     
                         $.post( $remote,{ modal: "modal" }, function( data ) {
                                $('body').append( data );
                              
                              $('#ajax-modal').modal('show');
                         });
                        return false;
               });
    
    
    //$('#kirim-data').on('click',function(e){
    $('body').on('click',"#kirim-data", function(){ 
        
                        if( $("#form-ganti-password").parsley('validate'))
                        {      
                           
                            var $remote = $('[data-toggle="modal-ajax"]').attr('href');

                            $.post($remote ,$('#form-ganti-password').serialize(), function( data ) {
                                    $('#msg').append(data.msg);
                                    
                                    $(':input','#form-ganti-password')
                                        .not(':button, :submit, :reset, :hidden')
                                        .val('');
                                    
                                    
                             },"json");
                         }
    });
    
    
    // Tooltips
     $('[data-toggle="tooltip"]').tooltip(); 
     $('[data-tooltip="tooltip"]').tooltip(); 
    
  }); // close document ready