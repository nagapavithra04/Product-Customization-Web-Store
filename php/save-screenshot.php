<?php
if(isset($_FILES['image'])){
    $image = file_get_contents($_FILES['image']['tmp_name']);
    // TODO: save $image to database

    // Retrieve the saved screenshot from the database
    // Assumes that the screenshot is stored in a table called "screenshots"
    $pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
    $stmt = $pdo->prepare('SELECT image FROM screenshots WHERE filename = ?');
    $stmt->execute(['UsersInformation.png']);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $saved_image = $row['image'];

    // Compare the saved screenshot to the uploaded screenshot
    if(base64_encode($image) === base64_encode($saved_image)){
        echo 'Screenshot saved successfully.';
    }
    else{
        echo 'Error: screenshot not saved.';
    }
}
else{
    echo 'No screenshot file uploaded.';
}
?>
