<?php
    include "db.php";
    $data = $_POST['phrase'];   
      
    $query = "SELECT * FROM product WHERE prod_name LIKE '%$data%' OR prod_code LIKE '%$data%'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){    
        while($row = mysqli_fetch_array($result)){      
            $output[] = $row;
        }   
    }else{    
      $output = array('prod_name' => 'Not Found');
    }   

    if($result){
        echo json_encode($output);		   
    }else{
        echo "fail";
    }

    mysqli_close($conn);
?>