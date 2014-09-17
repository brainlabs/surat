$(document).ready(function (){
    $('body').on('click','#login',function(){
        
        if($("#form_login").parsley('validate'))
        {
            $('#loader').show();
            $.ajax({
                    url: base_url + 'auth',
                    type: 'POST',
                    data: {username : $('#username').val(),passwd : $('#passwd').val()},
                    cache: false,
                    dataType: 'json',
                    
                    success: function(data, textStatus, jqXHR)
                    {
                        if(data.reload == true)
                        {
                           window.location.reload(data.reload);
                        }
                        else
                        {
                            $('.required-input').html(data.msg); 
                        }
                        
                        $('#loader').hide('slow');

                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                    // Handle errors here
                       // console.log('ERRORS: ' + textStatus);
                    // STOP LOADING SPINNER
						$('#loader').hide('slow');
                    }
                });
            }
    });
    
    
 });