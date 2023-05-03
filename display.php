<?php

include 'connect.php';


// Function to convert a multi-dimensional array to CSV format
function array_to_csv($data, $delimiter = ',', $enclosure = '"', $escape_char = "\\") {
    $output = '';
    foreach ($data as $row) {
        $output .= implode($delimiter, array_map(function($value) use ($enclosure, $escape_char) {
            $value = str_replace($enclosure, $escape_char.$enclosure, $value);
            return $enclosure.$value.$enclosure;
        }, $row))."\n";
    }
    return $output;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container mr-5">
        <button class="btn btn-primary m-5"><a href="user.php" class="text-light">Add user</a></button>

        <form method="post" action="" class="float-md-right">
            <button type="submit" name="download_csv" class="btn btn-primary">Download CSV</button>
            <a href="excel.php" class="btn btn-secondary">Download Excel</a>
            <a href="pdf.php" name="view" class="btn btn-warning">Get pdf document</a>
        </form>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Fname</th>
      <th scope="col">Lname</th>
      <th scope="col">Email</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php

   $sql = "Select * from `crud`";
   $result = mysqli_query($conn,$sql);

    if($result){
        while($row=mysqli_fetch_assoc($result)){
           $id=$row['id'];
           $fname=$row['fname'];
           $lname=$row['lname'];
           $email=$row['email'];
           $password=$row['password'];

           echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$fname.'</td>
                    <td>'.$lname.'</td>
                    <td>'.$email.'</td>
                    <td>
                    <button class="btn btn-primary"><a href="edit.php?editid='.$id.'" class="text-light">Edit</a></button>
                    <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                    </td>
                </tr>';
        }
    }

  ?>

  
   

   
  </tbody>
</table>
    </div>

    
    
    <a href="login.html" class="btn btn-info m-5">Login</a>
    
</body>
</html>