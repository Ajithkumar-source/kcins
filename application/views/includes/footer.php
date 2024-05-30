				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; KCINS <?=date("Y")?></span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?=base_url('logout');?>">Logout</a>
				</div>
			</div>
		</div>
	</div>
        
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Delete Confirmation!
            </div>
            <div class="modal-body">
                Are you sure To Delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
        <!-- <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script> -->
        <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
       


  <script src="//cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
        
	<script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?=base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?=base_url('assets/');?>js/sb-admin-2.min.js"></script>
        
        
        
        <script src="<?=base_url('assets/');?>js/demo/datatables-demo.js"></script>
        
        <script src="<?=base_url('assets/');?>js/demo/custom.js"></script>

   
        <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>

        <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

      <script>
/* Get the documentElement (<html>) to display the page in fullscreen */

function toggleFullscreen(elem) {
  elem = elem || document.documentElement;

  if (!document.fullscreenElement && !document.mozFullScreenElement &&
    !document.webkitFullscreenElement && !document.msFullscreenElement) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}
</script>
<script type="text/javascript">
        
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
            x.parent().parent().parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
            y.parent().parent().parent().addClass('active');
    </script>
     <script>
          $(document).ready(function(){
           
            $('#pytype').change(function(){
              
               
                var pid =$(this).val()
               
                if(pid !='')
                {
                  
                    $.ajax({
                        url:"<?php echo base_url('fetch_stype');?>",
                        method:"post",
                        dataType: "JSON",
                        data:{pid:pid},
                        success:function(data)
                        {
                              
                            var html = '<option value="">Select Subtype</option>';
                             for(var i = 0; i < data.length; i++)
                           { 
                         html += '<option value="'+data[i].sid+'">'+data[i].stype+'</option>';
                        
                             }
                                $('#stype').html(html);
                                
                            },
                                      
                        error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
            });

                 }else{
                    $('#subtype').html('<option value="">Select Stype</option>');
                 }
   });

   $('#make').change(function(){
              
               
              var make =$(this).val()
             
              if(make!='')
              {
                
                  $.ajax({
                      url:"<?php echo base_url('fetch_model');?>",
                      method:"post",
                      dataType: "JSON",
                      data:{make:make},
                      success:function(data)
                      {
                          // alert('hii');  
                          var html = '<option value="">Select Model</option>';
                           for(var i = 0; i < data.length; i++)
                         { 
                       html += '<option value="'+data[i].model+'">'+data[i].model+'</option>';
                      
                           }
                              $('#model').html(html);
                              
                          },
                                    
                      error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    alert('Internal error: ' + jqXHR.responseText);
                } else {
                    alert('Unexpected error.');
                }
            }
          });

               }else{
                  $('#model').html('<option value="">Select Model</option>');
               }
 });

 

$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});
        });

    </script>



<script>
   $(document).ready(function(){

$('#ctype').change(function(){
              
               
              var claimid =$(this).val()
             
              if(claimid !='')
              {
              
                  $.ajax({
                    
                      url:"<?php echo base_url('fetch_cstype');?>",
                      method:"post",
                      dataType: "JSON",
                      data:{claimid:claimid},
                      success:function(data)
                      {
                            
                          var html = '<option value="">Select Claim  Subtype</option>';
                           for(var i = 0; i < data.length; i++)
                         { 
                       html += '<option value="'+data[i].id+'">'+data[i].cstype+'</option>';

                           }
                              $('#cstype').html(html);
                          },
                                    
                      error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    alert('Internal error: ' + jqXHR.responseText);
                } else {
                    alert('Unexpected error.');
                }
            }
          });

               }else{
                  $('#cstype').html('<option value="">Select Claim Stype</option>');
               }
 });
 

      });
      </script>
<script>
          $(document).ready(function(){

            $("#insname").select2({
           theme: 'bootstrap4'
           });


           
            $("#pytype").select2({
           theme: 'bootstrap4'
           });

           $("#stype").select2({
           theme: 'bootstrap4'
           });

           $("#ctype").select2({
           theme: 'bootstrap4'
           });
           
           $("#cstype").select2({
           theme: 'bootstrap4'
           });

           $("#make").select2({
           theme: 'bootstrap4'
           });

           
           $("#model").select2({
           theme: 'bootstrap4'
           });
           
           $("#rep").select2({
           theme: 'bootstrap4'
           });
           
            
           $("#careof").select2({
           theme: 'bootstrap4'
           });

            
           $("#status").select2({
           theme: 'bootstrap4'
           });

           $("#inscompany").select2({
           theme: 'bootstrap4'
           });  
          
                
           $("#pno").select2({
           theme: 'bootstrap4'
           });
               
           
            
           $("#isname").select2({
           theme: 'bootstrap4'
           });
           
           $("#category").select2({
           theme: 'bootstrap4'
           });
                 
           
           $("#to_email").select2({
           theme: 'bootstrap4'
           });

           $("#to_sms").select2({
           theme: 'bootstrap4'
           });

           
           $("#nmtype").select2({
           theme: 'bootstrap4'
           });
          
            $('#insname').change(function(){
              
               
                var id =$(this).val()
               
                if(id !='')
                {
                  
                    $.ajax({
                        url:"<?php echo base_url('fetch_client');?>",
                        method:"post",
                        dataType: "JSON",
                        data:{id:id},
                        success:function(data)
                        {
                          
                          
                                $('#phone').val(data.phone);
                                $('#mobile').val(data.mobile);
                                $('#address').val(data.address);
                                $('#careof').val(data.careof).trigger('change');
                                $('#rep').val(data.rep).trigger('change');
                               
                            },
                                      
                        error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
            });

                 }else{
                    $('#rep').val();
                 }
   });

   $('#isname').change(function(){
              
               
              var id =$(this).val()
             
              if(id !='')
              {
                
                  $.ajax({

                      url:"<?php echo base_url('fetch_policy');?>",
                      method:"post",
                      dataType: "JSON",
                      data:{id:id},
                      success:function(data)
                      {
                          
                              var len=data.length;
                              if(len==0){
                                $('#pno').empty();
                                $('#pno').append($('<option>').text("Select Policy No"));
                              }
                              $('#careof').val(data[0].careof).trigger('change');
                              $('#rep').val(data[0].rep).trigger('change');
                              $('#pno').empty();
                              $('#pno').append($('<option>').text("Select Policy No"));
                              
                              for(var i=0;i<len;i++){
                                $('#pno').append($('<option>').text(data[i].pno).attr('value', data[i].pno));
                              }
                              
                              
                          },
                                    
                      error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    alert('Internal error: ' + jqXHR.responseText);
                } else {
                    alert('Unexpected error.');
                }
            }
          });

               }else{
                  $('#pno').val();
               }
 });
  


        });


        $('#EdataTable tbody').on('click', "#semail", function() {
          // alert("hi");     
  //var row = $(this).parents('tr')[0];
  //for row data
  //console.log(table.row(row).data().id);
});

//         $('#semail').on('click', function() {
              
              

//               var pid =$(this).data('pid');
             


//               alert(pid);
//               if(pid !='')
//               {
                
//                   $.ajax({
//                       url:"<?php echo base_url('send_renewalpolicy');?>",
//                       method:"post",
//                       dataType: "text",
//                       data:{pid:pid},
//                       success:function(data)
//                       {
                        
//                         alert(data);
                             
//                           },
                                    
//                       error: function (jqXHR, textStatus, errorThrown) {
//                 if (jqXHR.status == 500) {
//                     alert('Internal error: ' + jqXHR.responseText);
//                 } else {
//                     alert('Unexpected error.');
//                 }
//             }
//           });

//                }else{
//                   $('#rep').val();
//                }
//  });

    </script>
    <script>
     $(document).on('select2:open', function(e) {
     window.setTimeout(function () {
     document.querySelector('input.select2-search__field').focus();
    }, 0);

});
      </script>
      

<script>
$(document).ready(function() {


  $('#show-hide-password').on('click', function() {
    var passwordField = $('#npassword');
    var passwordFieldType = passwordField.attr('type');
    if (passwordFieldType == 'password') {
      passwordField.attr('type', 'text');
      $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      passwordField.attr('type', 'password');
      $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });


  $('#show-hide-password').on('click', function() {
    var passwordField = $('#rpassword');
    var passwordFieldType = passwordField.attr('type');
    if (passwordFieldType == 'password') {
      passwordField.attr('type', 'text');
      $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      passwordField.attr('type', 'password');
      $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });


  $('#show-password').on('click', function() {
    var passwordField = $('#cpassword');
    var passwordFieldType = passwordField.attr('type');
    if (passwordFieldType == 'password') {
      passwordField.attr('type', 'text');
      $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      passwordField.attr('type', 'password');
      $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });


  $('#show').on('click', function() {
    var passwordField = $('#password');
    var passwordFieldType = passwordField.attr('type');
    if (passwordFieldType == 'password') {
      passwordField.attr('type', 'text');
      $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      passwordField.attr('type', 'password');
      $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });




});

  </script>

<script>

CKEDITOR.replace('editor');

// $(function(){

//   $("#to_email").multiEmails({

//     // requires loading the latest Font Awesome

//     fontAwesome:true

//   });

// });

    // ClassicEditor
    //     .create( document.querySelector( '#editor' ), {
    //   height: 500,
    // } )
    //     .catch( error => {
    //         console.error( error );
    //     } );

       

  // $('#form').submit(function() {
  //   var content = CKEDITOR.instances.editor.getData();
  //   $('#form').append('<textarea name="editor">' + content + '</textarea>');
  // });
</script>
    



</body>

</html>
