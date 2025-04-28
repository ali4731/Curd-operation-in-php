

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Enter name" required>
        <input type="email" name="email" placeholder="Enter email" required>
        <input type="number" name="age" placeholder="Enter AGE" required>
        <button type="submit">Create</button>
    </form>
</body>
</html>


<?php

include '../db-con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $age = trim($_POST['age']);

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


    $sql = "INSERT INTO students (name, email, age) VALUES (?, ?, ?)";

    $stmp = $conn->prepare($sql);

 
    $stmp->bind_param("ssi", $username, $email, $age);


    if ($stmp->execute()) {
        
        echo "<div id='success-message'>Userr    Registered Successfully</div>";
        echo "
        <script>
            setTimeout(function(){
                document.getElementById('success-message').style.display = 'none';
            }, 2000); 
            // Hide the message after 2 seconds
            window.location.href = '../View/view.php';
        </script>

        ";
    } else {
        echo "Error: " . $stmp->error;
    }

    $stmp->close();
    $conn->close();
}

?>
