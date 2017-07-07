<!DOCTYPE html>
<html>
<head>
	<title>Dependent Dropdowns in Ajax </title>
</head>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/chosen.bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/chosen.css">
  


<body>
<nav class="navbar navbar-default">
  <div class="container-fluid" align="center">
    <h4>Dependent Dropdown in Ajax Using Codeigniter</h4>

    </div>
    </nav>
</div>


<br>
<br>
 <form role="form" class="form-horizontal" >
  <div class="form-group">
    <label class="control-label col-sm-2">Country</label>
    <div class="col-sm-4">
      <select class="form-control countries">
       <option value="">Select Country</option>
     </select>
   </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2">State</label>
  <div class="col-sm-4">
   <select class="form-control states">
     <option value="">Select State</option>
   </select>
 </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2">City</label>
  <div class="col-sm-4">
   <select class="form-control cities">
     <option value="">Select City</option>
   </select>
 </div>
 </div>

</form>
<div align="center">
<!-- <a href="https://web.facebook.com/eboominathan" title="Boominathan" target="_blank"></a> - Boominathan</div> -->





</body>
</html>

<div class="div">
  
</div>

<script type="text/javascript">
	
  $(document).ready(function(){

      $('.countries,.states,.cities').chosen({
        allow_single_deselect: true
        });
    /*Get the country list */

      $.ajax({
        type: "GET",
        url: "<?php echo base_url();?>category/get_countries",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $('.countries').find("option:eq(0)").html("Please wait..");
        },                         
        success: function (data) {
          /*get response as json */
           $('.countries').find("option:eq(0)").html("Select Country");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.countries').append(option);
         });  
          $('.countries').trigger("chosen:updated");

          /*ends */
          
        }
      });



    /*Get the state list */


    $('.countries').change(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>category/get_states",
        data:{id:$(this).val()}, 
        beforeSend :function(){
      $(".states option:gt(0)").remove(); 
      $(".cities option:gt(0)").remove(); 
      $('.states').find("option:eq(0)").html("Please wait..");

        },                         
        success: function (data) {
          /*get response as json */
           $('.states').find("option:eq(0)").html("Select State");
          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);           
           $('.states').append(option);
         });  

          /*ends */
          $('.states').trigger("chosen:updated");
          
        }
      });
    });




    /*Get the state list */


    $('.states').change(function(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>category/get_cities",
        data:{id:$(this).val()}, 
          beforeSend :function(){
   
      $(".cities option:gt(0)").remove(); 
      $('.cities').find("option:eq(0)").html("Please wait..");

        },  

        success: function (data) {
          /*get response as json */
            $('.cities').find("option:eq(0)").html("Select City");

          var obj=jQuery.parseJSON(data);
          $(obj).each(function()
          {
           var option = $('<option />');
           option.attr('value', this.value).text(this.label);
           $('.cities').append(option);
         });  
          
          /*ends */
          $('.cities').trigger("chosen:updated");
          
        }
      });
    });




  });





</script>
<style type="text/css">
  
</style>