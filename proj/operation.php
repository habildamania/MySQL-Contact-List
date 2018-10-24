<?php    
 if(isset($_POST["action"]))  
 {    $connect = mysqli_connect("localhost", "root", "", "CSV_DB");  
      if($_POST["action"] =="Add")  
      {    $idrr = array();
           $query = "INSERT INTO CONTACT(Fname,Mname,Lname) VALUES ('".$_POST["firstName"]."', '".$_POST["middleName"]."','".$_POST["lastName"]."');"; 
            mysqli_query($connect, $query);  
            $query1 = "Select max(Contact_id) as idr from CONTACT;";          
            $result = mysqli_query($connect, $query1);
            while($row = mysqli_fetch_array($result))  
            {$idrr['idr'] = $row["idr"];
            }
             $query2 = "Insert into DATE(Contact_id,Date_type,`DATE`) Values 
            ('".$idrr["idr"]."','".$_POST["DateType"]."','".$_POST["Date"]."');";
            mysqli_query($connect, $query2);
            $query3 = "Insert into PHONE(Contact_id,Phone_type,Area_code,Number) Values ('".$idrr['idr']."','".$_POST["PhoneType"]."','".$_POST["AreaCode"]."','".$_POST["PhoneNumber"]."');";
            mysqli_query($connect, $query3);
            $query4 ="Insert into ADDRESS(Contact_id,Address_type,Address,City,State,Zip) Values ('".$idrr['idr']."','".$_POST["AddressType"]."','".$_POST["Address"]."','".$_POST["City"]."','".$_POST["State"]."','".$_POST["Zip"]."');";
            mysqli_query($connect, $query4);
            echo 'Data Inserted';  
                  
             
      }  
      if($_POST["action"] == "Edit")  
      {  
           $query = "UPDATE CONTACT SET Fname = '".$_POST["firstName"]."', Mname = '".$_POST["middleName"]."', Lname = '".$_POST["lastName"]."' WHERE Contact_id = '".$_POST["id"]."';";      
           mysqli_query($connect, $query);
           
           $query1 = "UPDATE ADDRESS SET Address = '".$_POST["Address"]."', City = '".$_POST["City"]."', State = '".$_POST["State"]."', Zip = '".$_POST["Zip"]."' WHERE Contact_id = '".$_POST["id"]."' and Address_type = '".$_POST["AddressType"]."';";      
           mysqli_query($connect, $query1);
           
           $query2 = "UPDATE DATE SET Date_type = '".$_POST["DateType"]."', Date = '".$_POST["Date"]."' WHERE Contact_id = '".$_POST["id"]."';";      
           mysqli_query($connect, $query2);
           
           $query3 = "UPDATE PHONE SET Area_code = '".$_POST["AreaCode"]."', Number = '".$_POST["PhoneNumber"]."' WHERE Contact_id = '".$_POST["id"]."' and Phone_type = '".$_POST["PhoneType"]."';";      
           mysqli_query($connect, $query3);
           echo 'Data Updated';  
                  
             
      }  
      if($_POST["action"] == "Delete")  
      {  
           $query = "DELETE FROM CONTACT WHERE Contact_id = '".$_POST["id"]."';";    
                 
                     $query = mysqli_query($connect, $query);  
                       
                     echo 'Data Deleted';  
                  
           }  
      }  
   
 ?>  
