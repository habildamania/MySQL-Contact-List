<?php  
 include 'config.php';
 $output = ''; 
 $counter = ''; 
 if(isset($_POST["query"]))  
 {  
     $search = mysqli_real_escape_string($connect, $_POST["query"]);
     $query = "SELECT CONTACT.Contact_id, CONTACT.Fname, CONTACT.Mname, CONTACT.Lname, ADDRESS.Address_type, ADDRESS.Address, ADDRESS.City, ADDRESS.State, ADDRESS.Zip, PHONE.Phone_type, PHONE.Area_code, PHONE.Number, DATE.Date_type, DATE.DATE from Contact inner join Address on CONTACT.Contact_id = ADDRESS.Contact_id Inner join Phone on ADDRESS.Contact_id = PHONE.Contact_id INNER JOIN DATE on PHONE.Contact_id=DATE.Contact_id where CONTACT.Fname Like '%".$search."%' or CONTACT.Mname Like '%".$search."%' or CONTACT.Lname LIKE '%".$search."%' or ADDRESS.Address_type LIKE '%".$search."%' or ADDRESS.Address LIKE '%".$search."%' or ADDRESS.City LIKE '%".$search."%' or ADDRESS.State LIKE '%".$search."%' or ADDRESS.Zip LIKE '%".$search."%' or  PHONE.Phone_type LIKE '%".$search."%' or PHONE.Number LIKE '%".$search."%' or DATE.Date_type LIKE '%".$search."%' or DATE.DATE LIKE '%".$search."%';";  
        
           if(mysqli_query($connect, $query))  
           {  
              
                $result = mysqli_query($connect, $query);  
                $output .= '  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                     <table style = "width: 100%; height: auto;" class="w3-table-all">  
                          <tr> 
                               <th>Contact ID</th>
                               <th>First Name</th>  
                               <th>Middle Name</th>
                               <th>Last Name</th>
                               <th>Address Type</th>
                               <th>Address</th>
                               <th>City</th>
                               <th>State</th>
                               <th>Zip</th>
                               <th>Phone Type</th>
                               <th>Area Code</th>
                               <th>Phone Number</th>
                               <th>Date Type</th>
                               <th>Date</th>
                               <th>Update</th>  
                               <th>Delete</th>  
                          </tr>  
                ';  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          $output .= '  
                               <tr id="'.$row["Address_type"].'">  
                                    <td height = "100" style ="vertical-align: middle;">'.$row["Contact_id"].'</td>
                                    <td  style ="vertical-align: middle;">'.$row["Fname"].'</td>  
                                    <td  style ="vertical-align: middle;">'.$row["Mname"].'</td>
                                    <td  style ="vertical-align: middle;">'.$row["Lname"].'</td>
                                    <td  style ="vertical-align: middle;">'.$row["Address_type"].'</td>
                                    <td  style ="vertical-align: middle;">'.$row["Address"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["City"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["State"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["Zip"].'</td>
                                    <td style ="vertical-align: middle;"><abc name = "abc" id = "'.$row["Phone_type"].'">'.$row["Phone_type"].'</abc></td>
                                    <td style ="vertical-align: middle;">'.$row["Area_code"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["Number"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["Date_type"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["DATE"].'</td>
                                    <td style ="vertical-align: middle;"><button type="button" name="update" id="'.$row["Contact_id"].'" class="update btn btn-primary btn-xs">Update</button></td>  
                                    <td style ="vertical-align: middle;"><button type="button" name="delete" id="'.$row["Contact_id"].'" class="delete btn btn-danger btn-xs">Delete</button></td>  
                               </tr>  
                          ';  
                     }  
                }  
                else  
                {  
                     $output .= '  
                          <tr>  
                               <td colspan="4">Data not Found</td>  
                          </tr>  
                     ';  
                }  
                $output .= '</table>';  
             
                echo $output;  
           
           }  
     
     
 }   
    
 

else{
     
          $query = "SELECT CONTACT.Contact_id, CONTACT.Fname, CONTACT.Mname, CONTACT.Lname, ADDRESS.Address_type, ADDRESS.Address, ADDRESS.City, ADDRESS.State, ADDRESS.Zip, PHONE.Phone_type, PHONE.Area_code, PHONE.Number, DATE.Date_type, DATE.DATE from Contact inner join Address on CONTACT.Contact_id = ADDRESS.Contact_id Inner join Phone on ADDRESS.Contact_id = PHONE.Contact_id INNER JOIN DATE on PHONE.Contact_id=DATE.Contact_id order by Contact_id DESC";  
        
           if(mysqli_query($connect, $query))  
           {  
              
                $result = mysqli_query($connect, $query);  
                $output .= '  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                     <table style = "width: 100%; height: auto;" class="w3-table-all w3-hoverable">  
                          <tr> 
                               <th>Contact ID</th>
                               <th>First Name</th>  
                               <th>Middle Name</th>
                               <th>Last Name</th>
                               <th>Address Type</th>
                               <th>Address</th>
                               <th>City</th>
                               <th>State</th>
                               <th>Zip</th>
                               <th>Phone Type</th>
                               <th>Area Code</th>
                               <th>Phone Number</th>
                               <th>Date Type</th>
                               <th>Date</th>
                               <th>Update</th>  
                               <th>Delete</th>  
                          </tr>  
                ';  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          $output .= '  
                               <tr id="'.$row["Address_type"].'">  
                                    <td height = "100" style ="vertical-align: middle;">'.$row["Contact_id"].'</td>
                                    <td  style ="vertical-align: middle;">'.$row["Fname"].'</td>  
                                    <td  style ="vertical-align: middle;">'.$row["Mname"].'</td>
                                    <td  style ="vertical-align: middle;">'.$row["Lname"].'</td>
                                    <td  style ="vertical-align: middle;">'.$row["Address_type"].'</td>
                                    <td  style ="vertical-align: middle;">'.$row["Address"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["City"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["State"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["Zip"].'</td>
                                    <td style ="vertical-align: middle;"><abc name = "abc" id = "'.$row["Phone_type"].'">'.$row["Phone_type"].'</abc></td>
                                    <td style ="vertical-align: middle;">'.$row["Area_code"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["Number"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["Date_type"].'</td>
                                    <td style ="vertical-align: middle;">'.$row["DATE"].'</td>
                                    <td style ="vertical-align: middle;"><button type="button" name="update" id="'.$row["Contact_id"].'" class="update btn btn-primary btn-xs">Update</button></td>  
                                    <td style ="vertical-align: middle;"><button type="button" name="delete" id="'.$row["Contact_id"].'" class="delete btn btn-danger btn-xs">Delete</button></td>  
                               </tr>  
                          ';  
                     }  
                }  
                else  
                {  
                     $output .= '  
                          <tr>  
                               <td colspan="4">No Match Found</td>  
                          </tr>  
                     ';  
                }  
                $output .= '</table>';  
             
                echo $output;  
           
           }  
     
     
 }  
 ?>  