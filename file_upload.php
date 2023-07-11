<html>

<body>
    <form method="post" action="fileupload.php" enctype="multipart/form-data">
        <h1>File Upload</h1>
        <input type="file" name="image">
        <input type="submit" value="Upload">
    </form>
</body>

</html>


<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['image']['name']);
if (isset($_FILES['image'])) {
    $fn = $_FILES['image']['name'];
    $fs = $_FILES['image']['size'];
    $ft = $_FILES['image']['type'];
    $ftp = $_FILES['image']['tmp_name'];

    echo "filename: " . $fn . "<br>filesize: " . $fs . "<br>filetype: " . $ft . "<br>";

    if (!file_exists($target_file)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "<script>alert('file uploaded!!!!')</script>";
            echo "<img src='" . $target_file . "' alt='Uploaded Image' widht='200px'>";

            echo "<br><br>All Uploads : <br>";
            $imageFiles = glob($target_dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

            // Iterate through each image file and display them
            foreach ($imageFiles as $imageFile) {
                echo "<img src='" . $imageFile . "' alt='Image' width='200px'>";
            }
        }
    } else {
        echo "file already exists";
    }
}
