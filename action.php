<?php
require_once 'db.php';

$db = new Database();

if(isset($_POST['action']) && $_POST['action'] == "view"){
    $output = '';
    $data = $db->read();
    if($db->totalRowCoount() >0){
        $output .= ' <table class="table table-striped table-sm table-bordered my-2" id="myTable">
        <thead>
          <tr class="text-center">
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>';
        $n = 1;
        foreach($data as $row){
         
            $output .= ' <tr class="text-center text-secondary">
            <td>'.$n.'</td>
            <td>'.$row['firstname'].'</td>
            <td>'.$row['lastname'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone'].'</td>
            
            <td><a href="#" title="View Details" class="text-success infoBtn" id="'.$row['id'].'" data-toggle="modal" data-target="#infoModal"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;


            <a href="#" title="Edit" class="text-primary editBtn"  data-toggle="modal" data-target="#editModal" id="'.$row['id'].'"><i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;


            <a href="#" title="Delete Details" class="text-danger delBtn" id="'.$row['id'].'"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;
          </td></tr>';

          $n = $n + 1;
        }
        $output .= '</tbody></table>';
        echo $output;
    }
    else{
        echo '<h3 class="text-center text-seondary mt-5">:(No any user present in the database!</h3>';
    }

}

if(isset($_POST['action']) && $_POST['action'] == "insert"){
  // echo "hy";exit;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
   
   $db->insert($fname, $lname, $email, $number);
    
}

if(isset($_POST['action']) && $_POST['action'] == "insert"){
  // echo "hy";exit;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
   
   $db->insert($fname, $lname, $email, $number);
    
}



if(isset($_POST['edit_id']) ){
  // echo "hy";exit;
  $id = $_POST['edit_id'];
   
   
    $row = $db->getUserById($id);
    echo json_encode($row);
}


if(isset($_POST['action']) && $_POST['action'] == "update"){
  // echo "hy";exit;
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
   
    $db->update($id, $fname, $lname, $email, $number);
    
}

if(isset($_POST['del_id'])){
  $id = $_POST['del_id'];

  echo $db->delete($id);
}


if(isset($_POST['info_id']) ){
  // echo "hy";exit;
  $id = $_POST['info_id'];
   
   
    $row = $db->getUserById($id);
    echo json_encode($row);
}


if(isset($_GET['export']) && $_GET['export'] == "excel"){
  header("Content-Type: application/xls");
  header("Content-Disposition: attachement; filename=users.xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  $data = $db->read();
  echo '<table border="1">';
  echo '<tr><th>ID</th><th>Frist Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>';

  foreach($data as $row){

    echo '<tr>
    <td>'.$row['id'].'</td>
    <td>'.$row['firstname'].'</td>
    <td>'.$row['lastname'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['phone'].'</td>
    </tr>';
  }
  echo '</table>';
}
?>