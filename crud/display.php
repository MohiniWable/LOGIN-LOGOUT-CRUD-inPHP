<?php
include 'connect.php';

$limit_page = 3;
$page = "";
// show data on webpage
if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
}else{
    $page = 1;
}
   
$offset = ($page-1) * $limit_page;


$displayquery = "SELECT * FROM `crudtable` LIMIT $offset, $limit_page ";
$result = mysqli_query($conn, $displayquery);

if(mysqli_num_rows($result) > 0){

    $table = '<table class="table table-bordered table-striped">
    <thead class="table-dark"">
        <tr>
            <th>No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Mobile No.</th>
            <th>Operations</th>
           
        </tr>
     </thead> ';

    $number=1;
    while($row = mysqli_fetch_assoc($result)){

        $id = $row["id"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $email = $row["email"];
        $mobile = $row["mobile"];


        $table .= '<tr>
        <td>'.$number.'</td>
        <td>'.$firstname.'</td> 
        <td>'.$lastname.'</td> 
        <td>'.$email.'</td> 
        <td>'.$mobile.'</td> 
        <td>
            <button onclick="GetUserDetails('.$id.')" class="btn btn-warning">Edit</button>
            <button onclick="DeleteUser('.$id.')" class="btn btn-danger">Delete</button>
        </td>
    </tr>';
    $number++;

    }
}
   $table .='</table>';

   $fetch_query = mysqli_query($conn, "SELECT * FROM `crudtable`");
   $row = mysqli_num_rows($fetch_query);
   $total_pages = ceil($row/$limit_page);
   $table .= '<div class="paginationDiv">  
   <nav aria-label="Page navigation example">
       <ul class="pagination justify-content-center">
        
        ';

        for($i = 1; $i<= $total_pages;$i++){
            if($i==$page){
                $active = "active";
            }else{
                $active = "";
            }
            $table .= '<li class='.$active.'> <a class="page-link active" id='.$i .'>' .$i . '</a></li>';
        }

           
        $table .= '
       </ul>
   </nav>
   </div>';


   echo $table;


?>