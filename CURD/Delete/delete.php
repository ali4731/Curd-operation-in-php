<?php

include '../db-con.php';


if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id =?";

    $stmp = $conn->prepare($sql);
    $stmp->bind_param("i", $id);

    if($stmp->execute()){
        echo "
            <script>
                alert('Record deleted succesfully');
                window.location.href = '../View/view.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Error deleting record: ' . $stmp->error);
            </script>
        ";
    }

    $stmp->close();
    $conn->close();


}
else{
    echo "No ID Founded";
}

?>