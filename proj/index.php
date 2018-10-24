<html>  
      <head>  
           <title>SQL Assignment 1</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>
body {font-family: Arial, Helvetica, sans-serif;}


               
#myB {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: black;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myB:hover {
  background-color: #555;
}
               
               
               
               
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
               
.your-class input{
  float:left;
margin-right: 10px;
}               
</style>
      </head>  
      
    <body>  
           <div class="container-fluid">  
               <div style="font-size:300%;margin-top:10px;color:black;"><center>Address Book</center></div>
                <button onclick="topFunction()" id="myB" title="Go to top">Top</button>    
               
                
                <div id="myModal" class="modal"> 

  <!-- Modal content -->
  <div class="modal-content">
      <span class="close">&times;</span> 
            <div class="your-class">
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder = "First name" style = "width:32%;"/>  &nbsp;
                  
                <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder = "Middle name"  style = "width:28%;"/>  
            
      &nbsp;
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder = "Last name" style = "width:32%;" /> 
            </div>    
      <br />         
      <br />
      <select class="form-control input-sm" id="Address_type" placeholder = "Address Type" >
        <option value="" selected data-default>Address Type</option>
        <option>Home</option>
        <option>Work</option>
     </select>     
      <br />
                <input type="text" name="Address" id="Address" class="form-control" placeholder = "Address" />  
           <br />
               
           <div class="your-class">  
              <input type="text" name="City" id="City" class="form-control" placeholder = "City" style="width: 33%"/>  
                <input type="text" name="State" id="State" class="form-control" placeholder = "State" style="width: 33%" />
               <input type="text" name="Zip" id="Zip" class="form-control" placeholder = "Zip" maxlength="5" style="width: 30%" />  
      </div>     
      <br />
      <br />
           <br />         
               <select class="form-control input-sm" id="Phone_type" placeholder = "Phone Type">
        <option value="" selected data-default>Phone Type</option>
        <option>Home</option>
        <option>Work</option>
        <option>Cell</option>
     </select>  
               <br />
                <div class="your-class">    
               <input type="text" name="Area_code" id="Area_code" class="form-control" placeholder = "Area Code" maxlength="3" style="width: 17%" />  
            
               <input type="text" name="Number" id="Phone_number" class="form-control" placeholder = "Phone Number" maxlength="10" style="width: 80%" />  
                    </div>
                    <br />
                    <br />
            <div class="your-class">   
            <input type="text" name="Date_type" id="Date_type" class="form-control" placeholder = "Date Type" style="width: 49%;" />  
               <input type="text" name="Date" id="Date" class="form-control" placeholder = "Date (mm/dd/yy)"  style="width: 48%;" />  
               </div>
      <br /><br />  
                <div align="center">  
                     <input type="hidden" name="id" id="user_id" />  
                     <button type="button" name="action" id="action" class="btn btn-success" style="width: 80%" >Add</button>  
      </div></div>           
       
               </div> 
               <div class="your-class">
               <input type="text" name="search_text" id="search_text" class="form-control" placeholder = "Search"  style="width:80%;" /> 
                <button type="submit" class="btn btn-success" id="myBtn" style="width:19%;" >ADD</button> 
               </div>
                <br />
               <br />
                <div id="result" class="table-responsive">  
                </div>  
           </div>  


    </body>  

</html>  
 <script>  
 $(document).ready(function(){  
      findContact();  
      function findContact(query)  
      {  
            
           $.ajax({  
                url : "find.php",  
                method:"POST",  
                data:{query:query},  
                success:function(values){  
                     $('#first_name').val('');  
                     $('#middle_name').val('')
                     $('#last_name').val('');
                     $('#Address_type').val('');
                     $('#Address').val('');
                     $('#City').val('');
                     $('#State').val('');
                     $('#Zip').val('');
                     $('#Phone_type').val('');
                     $('#Area_code').val('');
                     $('#Phone_number').val('');
                     $('#Date_type').val('');
                     $('#Date').val('');
                    
                     $('#action').text("Add");  
                     $('#result').html(values);  
                }  
           });  
      }  
      $('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			findContact(search);
		}
		else
		{
			findContact();			
		}
	});
     
        $('#action').click(function(){  
           var firstName =  $('#first_name').val();  
           var middleName = $('#middle_name').val();
           var lastName =   $('#last_name').val();
           var AddressType =  $('#Address_type').val();
           var Address =  $('#Address').val();
           var City =  $('#City').val();
           var State =  $('#State').val();
           var Zip =  $('#Zip').val();
           var PhoneType =  $('#Phone_type').val();
           var AreaCode =  $('#Area_code').val();
           var PhoneNumber =  $('#Phone_number').val();
           var DateType =  $('#Date_type').val();
           var Date =  $('#Date').val();
           var id = $('#user_id').val();  
           var action = $('#action').text();  
           $.ajax({  
                     url : "operation.php",  
                     method:"POST",  
                     data:{firstName:firstName, middleName:middleName, lastName:lastName, id:id, action:action, AddressType:AddressType, Address:Address, City:City, State:State, Zip:Zip, PhoneType:PhoneType, AreaCode:AreaCode, PhoneNumber:PhoneNumber, DateType:DateType,Date:Date },  
                     success:function(data){  
                          alert(data);  
                          findContact();  
                     }  
                });  
             
          
      });  
      $(document).on('click', '.update', function(){  
           var id = $(this).attr("id");
           var A_type = $(this).closest('tr').attr('id');
           var P_type = $('abc').attr('id');
           $.ajax({  
                url:"find_update.php",  
                method:"POST",  
                data:{id:id, A_type:A_type, P_type:P_type},  
                dataType:"json",  
                success:function(data){  
                     $('#myBtn').click();
                     
                     $('#action').text("Edit");  
                     $('#user_id').val(id);  
                     $('#first_name').val(data.first_name);  
                     $('#middle_name').val(data.middle_name); 
                     $('#last_name').val(data.last_name);
                     $('#Address_type').val(data.Address_type);
                     $('#Address').val(data.Address);
                     $('#City').val(data.City);
                     $('#State').val(data.State);
                     $('#Zip').val(data.Zip);
                     $('#Phone_type').val(data.Phone_type);
                     $('#Area_code').val(data.Area_code);
                     $('#Phone_number').val(data.Phone_number);
                     $('#Date_type').val(data.Date_type);
                     $('#Date').val(data.Date);
                }  
           })  
      });  
      $(document).on('click', '.delete', function(){  
           var id = $(this).attr("id");  
           if(confirm("Are you sure you want to remove this data?"))  
           {  
                var action = "Delete";  
                $.ajax({  
                     url:"operation.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data)  
                     {  
                          findContact();  
                          alert(data);  
                     }  
                })  
           }  
           else  
           {  
                return false;  
           }  
      });  
 });  

var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myB").style.display = "block";
    } else {
        document.getElementById("myB").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}



</script>  