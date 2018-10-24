<?php   
 include 'config.php'; 
 if(isset($_POST["id"]))  
 {  
      $output = array();  
      $query = "SELECT * FROM CONTACT WHERE Contact_id = '".$_POST["id"]."';";   
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))  
      {  
      $output['first_name'] = $row["Fname"];  
      $output['middle_name'] = $row["Mname"];
      $output['last_name'] = $row["Lname"];
      
      }  
      $query = "SELECT * FROM ADDRESS WHERE Contact_id = '".$_POST["id"]."' and Address_type = '".$_POST["A_type"]."';";   
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))  
      {  
      $output['Address_type'] = $row["Address_type"];  
      $output['Address'] = $row["Address"];
      $output['City'] = $row["City"];
      $output['State'] = $row["State"];
      $output['Zip'] = $row["Zip"];
       
      
      } 
     
      $query = "SELECT * FROM PHONE WHERE Contact_id = '".$_POST["id"]."' and Phone_type = '".$_POST["P_type"]."';";   
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))  
      {  
      $output['Phone_type'] = $row["Phone_type"];  
      $output['Area_code'] = $row["Area_code"];
      $output['Phone_number'] = $row["Number"];
      }
      
      $query = "SELECT * FROM DATE WHERE Contact_id = '".$_POST["id"]."';";   
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))  
      {  
      $output['Date_type'] = $row["Date_type"];  
      $output['Date'] = $row["Date"];
    }
      
     
     echo json_encode($output);  
             
        
 }  
 ?>  