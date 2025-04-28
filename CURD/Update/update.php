<?php

include '../db-con.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];   


    // $sql = "SELECT id, name, email, age FROM students where id= ?";
    // $stmp = $conn->prepare($sql);
    // $stmp->bind_param("i", $id);
    // $stmp->execute();
    // $result = $stmp->get_result();
    // $student = $result->fetch_assoc();
    // $stmp->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $age =(int) trim($_POST['age']);

    if (empty($username)) {
        echo "Username is Required";
        exit();
    } else if (empty($email)) {
        echo "Email is Required";
        exit();
    } else if (empty($age)) {
        echo "Age is Required";
        exit();
    }


    
    $sql = "UPDATE students SET name = ?, email = ?, age = ? WHERE id= ? " ;
    $stmp = $conn->prepare($sql);
    $stmp->bind_param("ssii", $username, $email, $age, $id);

    if($stmp->execute()){
        echo "
            <Script>
                alert('Record updated Succesfull');
                window.location.href = '../View/view.php';
            </Script>
        ";
    }
    else{
        echo "Error" . $stmp->error;
    }

    $stmp->close();
    $conn->close();
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<form action="" method="post">
        <input type="text" name="username" placeholder="Enter name" required>
        <input type="email" name="email" placeholder="Enter email" required>
        <input type="number" name="age" placeholder="Enter AGE" required>
       <a href="../View/view.php"></a> <button type="submit">Update</button>
    </form>
</body>
</html>