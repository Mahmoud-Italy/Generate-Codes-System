<script>
	$(function(){

	  $(".scope_category").change(function(){
        var obj = $(this).val();
        if(obj == 1) {
           $(".scope_name").val('-').prop('readonly',true);
           $(".lbl-scope-name").text("Scope Name");
        } else if (obj == 2) {
           $(".scope_name").val('').prop('readonly',false).prop("required");
           $(".lbl-scope-name").text("Incremental Start from");
        } else {
          $(".scope_name").val('').prop('readonly',false).prop("required");
          $(".lbl-scope-name").text("Scope Name");
        }

   });

  });  
</script>