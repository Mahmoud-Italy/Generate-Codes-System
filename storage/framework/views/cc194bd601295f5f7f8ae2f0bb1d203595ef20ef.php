<script>
   $(function(){
     
       $(".btn-signup-submit").click(function(){
          $(this).prop('disabled', true);
          $(".fa ").addClass("fa-circle-o-notch fa-spin");
          Signup();
       });
  
	});

   function Signup(){
   	  var form = $("#frmSignup");
      var formData = form.serialize();
      var Url = "<?php echo e(url('signup')); ?>";

     $.ajaxSetup({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      });

     $.ajax({
      	url : Url,
        type : "POST",
        data : formData,
        dataType : "json",
        success : function(data){
              $(".btn-signup-submit").prop('disabled', false);
              $(".fa").removeClass("fa-circle-o-notch fa-spin");
             if(data.success) {
                window.location.href = "../";
             } else {
                $(".alert").addClass(data.class).text(data.err);
             }
         }
      });
      return false;
   };
</script>