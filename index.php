<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
</head>
<body>
  <div class="container">
  <!--formstart-->
  <form id="form">
      <row>
        <div class="col-3">
          <label for="" class="input-group">first Name</label>
          <input type="text" name="first_name" id="first_name">
        </div>
        <div class="col-3">
          <label for="" class="input-group">last name</label>
          <input type="text" name="last_name" id="last_name">
        </div>
   
        <div class="col-3"> <label for="" class="input-group">age</label> 
        <input type="number" name="age" id="age"></div>
      </row>
    <button class="btn  btn-primary mt-5" id="save">save record</button>
      <input type="text"class=" mt-5  float-end" placeholder="search" id="search" >
    </form>
 <!--form-end-->



<!-- Modal start -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update_user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="edit-save" data-bs-dismiss="modal" >save</button>
      </div>
    </div>
  </div>
</div>
 <!-- modal_end -->
    <hr>
    
  <div id="table" class="mt-2"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function(){
     //data load
      function loadData(){
        $.ajax({
          url:"load.php",
          type:"get",
          success:function(data){
            $('#table').html(data);
          }
        });
      }
      loadData()


      //insert code here
      $('#save').on("click",function(e){
      e.preventDefault();
            var fname=$('#first_name').val();
            var lname=$('#last_name').val();
            var age=$('#age').val();
        if(fname=="" || lname=="" || age==''){
          alert('please fill all the field')
        }else{
              $.ajax({
                  url:"insert.php",
                  type: "POST",
                  data:{'first_name':fname, 'last_name':lname, 'age':age}, //json, string, object three wawy to send data in ajax
                  success: function(data){
                    if(data==1){
                      loadData();
                      $('#form').trigger('reset');
                    }else{
                      alert('Cant_Save_data');
                    }
                  
                  }
                });
        }
  
      
      }); //end insert


 //delete_code_here
 $(document).on('click','.btn-danger',function(){
        if(confirm('are you sure?')){
      var user_data =$(this).data("id");
        var element = this;
      $.ajax({
       url:'delete.php',
       type:'POST',
       data:{id:user_data},
       success:function(data){
        if(data==1){
          $(element).closest("tr").fadeOut();
   
        }else{
          alert('jjdj')
        }
  
       }
     });
    }

    
      }); //end delete

 //edit 
          $(document).on('click','#eupdate',function(){
            var user_id= $(this).data("id");
         
            $.ajax({
              url:'load_update.php',
              type:'POST',
              data:{id:user_id},
              success:function(data){
                $('.modal-body').html(data);
              }
            });

      }); //end_edit

            //update_save
           
            $(document).on("click","#edit-save", function(){
             var user_id = $("#id").val();
             var fname = $("#f").val();
             var lname = $("#l").val();
             var age=$('#a').val();
            
              $.ajax({
                      url:'save_update.php',
                      type:'POST',
                    
                      data:{'id':user_id,'first_name':fname, 'last_name':lname, 'age':age},
                      success:function(data){
                        loadData();
                      }
              });
      }); //end_save_update
      
      //search_start
$('#search').on('keyup',function(){
var search=$(this).val();

$.ajax({
  url:'search.php',
  type:'POST',
  data:{search:search},
  success:function(data){
    $('#table').html(data);
  }
});
});



//search_end


     


   
    });
    
  </script>
</body>
</html>
