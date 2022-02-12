$(document).ready(function(){


   $('#customer').DataTable();

  $( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

   $('#customer_search_submit').on('click',function(){
            var _token = $('#token').val();
            $value = $('#search').val();
            $.ajax({
               type:'GET',
               url:'/customers',
               data:{'search':$value,_token:_token},
               success: function(data){
                console.log(data);
               }
            });
   });

   $('#customer_create_record').click(function(){
  	//alert('hi');
  	$('.modal-title').text('ADD NEW RECORD');
  	$('#customer_action_button').val('ADD');
  	$('#customer_action').val('ADD');
  	$('#customer_form_Modal').modal('show');

  });

   $('#customer_form').on('click','#customer_action_button',function(e){
   	   e.preventDefault();
   	   
   	   if($('#customer_action').val()=='ADD'){
 //alert("HIIII");
   	   		$.ajax({
   	   			url:'/customer_add',
   	   			method:'POST',
   	   			data:$('#customer_form').serialize(),
   	   			dataType:"json",
   	   			success:function(data)
              {
               var html = '';
                  if(data.errors){
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++){
                      html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                    }
                    if(data.success){
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#customer_form')[0].reset();
                    location.reload();
                  }
                  $('#customer_form_result').html(html);
              }
   	   		});
   	   }

   	   if($('#customer_action').val()=='EDIT'){
          //alert("edit");
          //return;
          $.ajax({
          		url:'/customer_update',
   	   			method:'POST',
   	   			data:$('#customer_form').serialize(),
   	   			dataType:"json",
           success:function(data)
              {
               var html = '';
                  if(data.errors){
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++){
                      html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                    }
                    if(data.success){
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#customer_form')[0].reset();
                    location.reload();
                  }
                  $('#customer_form_result').html(html);
              }

      });

        }

   });
   
   $(document).on('click', '.edit', function(){ 
    	/*alert('edit');
   		return;*/
   		var id = $(this).attr('id');
   		$('#customer_form_result').html('');
   		$.ajax({
   			url:'/customer_edit/'+id,
   			dataType:"json",
   			success:function(html){
   				$('#customer_name').val(html.data.customer_name);
          $('#mobile').val(html.data.mobile);
          $('#email').val(html.data.email);
          $('#address1').val(html.data.address1);
          $('#address2').val(html.data.address2);
          $('#city').val(html.data.city);
          $('#pincode').val(html.data.pincode);
          $('#state').val(html.data.state);
          $('#country').val(html.data.country);
   				$('#hidden_id').val(html.data.id);
   				$('.modal-title').text("EDIT THE RECORD");
			    $(".modal-body").removeClass('bg-primary').addClass('bg-success');
			    $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
			    $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
			    $('#customer_action_button').val("EDIT");
			    $('#customer_action').val("EDIT");
			    $('#customer_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
			    $('#cloes').removeClass('btn btn-secondary').addClass('btn btn-success');
			    $('#customer_form_Modal').modal('show');
   			}
   		});
   });


  var customer_id;
  $(document).on('click', '.delete', function(){
      customer_id = $(this).attr('id');
      $('#customer_confirm_Modal').modal('show');      
  });

  $('#customer_ok_button').click(function(){
        $.ajax({
          url:'/customer_delete/'+customer_id,
          beforeSend:function(){
            $('#customer_ok_button').text('Deleting.....');
            },
            success:function(data){
              setTimeout(function(){
                $('customer_confirm_Modal').modal('hide');
                location.reload();
              }, 2000);
            }
        });
  });


	
});