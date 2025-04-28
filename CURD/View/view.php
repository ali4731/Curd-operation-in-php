<?php

include '../db-con.php';


$sql = "SELECT id, name, email, age FROM students";


$result = mysqli_query($conn, $sql);


$students = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_close($conn);

if (!empty($students)) {
    echo "<table border='1'>
            <a href= '../Create/create.php'><Button>Create</Button></a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";

    foreach ($students as $student) {
        echo "<tr>
                <td>" . htmlspecialchars($student['id']) . "</td>
                <td>" . htmlspecialchars($student['name']) . "</td>
                <td>" . htmlspecialchars($student['email']) . "</td>
                <td>" . htmlspecialchars($student['age']) . "</td>
                <td> 
                    <a href='../Delete/delete.php?id=" . $student['id'] . "'><button>Delete</button></a>                     
                    <a href='../Update/update.php?id=". $student['id'] . "'><button>Update</button></a>   
                 </td>
            
                
              </tr>";
    }

    echo "</tbody></table>";

} else {
    echo "No students found.". "<br>";
    echo "<a href= '../Create/create.php'><Button>Create</Button></a>";
}
?>
