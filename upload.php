<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //$error = $_FILES['file']['error'] . '<br><br>';

        if (isset($_FILES['file']['name'])) {
            $name = $_FILES['file']['name'];

            $size = $_FILES['file']['size'];

            $type = $_FILES['file']['type'];

            $extension = substr($name, strrpos($name, '.'));

            $tmp_name = $_FILES['file']['tmp_name'];

            $max_size = 1024 * 2 * 1024;
            if (!empty($name)) {
                if ($size <= $max_size && $type == 'image/jpeg' && ($extension == '.jpg' || $extension == '.jpeg')) {
                    $location = 'uploads/';
                    if (move_uploaded_file($tmp_name, $location . $name)) {
                        echo 'Uploaded!';
                    } else {
                        echo 'There was an error!';
                    }
                }
                else{
                    echo 'File must be jpg/jpeg and must be 2MB or less!';
                }
            } else {
                echo 'Please choose a file!';
            }
        }
        ?>

        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file"><br><br>
            <input type="submit" value="Upload">
        </form>
    </body>
</html>
