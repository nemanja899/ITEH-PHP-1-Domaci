<?php

include_once 'DbConnectionFactory.php';
include_once 'model/Vacation.php';
session_start();
if (isset($_POST['submit-upload'])) {
    // File upload configuration 

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    $errorMsg  = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
  
    $vacation = new Vacation();
    $vacation->Description = $_POST['description'];
    $vacation->Name = $_POST['name'];
    $vacation->Price =  (double)$_POST['price'];
    
    $vacation->Place = $_POST['place'];

    mysqli_autocommit($conn, False);
    $result = Vacation::add($vacation, $conn);
    $error = False;

    if ($result) {
        $targetDir = "Img/" . Strtolower($_POST['name']."/");
        if (!is_dir($targetDir)) {
            //Create our directory if it does not exist
            mkdir($targetDir);
        }
        if (!empty($fileNames)) {
            foreach ($_FILES['files']['name'] as $key => $val) {
                // File upload path 
                $file=$_FILES['files']['name'][$key];
                echo "<script>console.log('Ime fajla:'+'$file');</script>";
                $fileName = basename($file);
                $targetFilePath = $targetDir . $fileName;
                
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
               echo "<script>console.log('Tip fajla'+'$fileType');</script>";
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                        echo "<script>console.log('Fajl je pomeren');</script>";
                    } else {
                        $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                        $error = True;
                    }
                } else {
                    $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
                    $error = True;
                }
            }
            if ($error) {
                // Error message 
                $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                mysqli_rollback($conn);
                echo "<script>alert('$errorMsg');</script>";
            }else{
                mysqli_commit($conn);
                echo "<script>alert('Uspesno dodavanje');</script>";
            }
        } else {
            $errorMsg = 'Please select a file to upload.';
            echo "<script>alert('$errorMsg');</script>";
        }
    } else {
         mysqli_rollback($conn);
         echo "<script>alert('Neuspesno dodavanje');</script>";
    }
}
mysqli_autocommit($conn, True);
unset($_POST);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etno Srbija</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="font/fonts.css">
    <link rel="stylesheet" href="CSS/normalize.css">

    <link rel="stylesheet" href="CSS/Style.css">
</head>

<body>
    <!-- navbar -->
    <section class="header-navbar" style="background-color: #adba8a !important;">
        <a href="index.php" class="site-brand">
            Etno<span>Srbija</span>
        </a>
        <nav class="navbar">
            <a href="index.php" class="active-page"> Home</a>
            <a href="About.php"> About</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

    <div class="upload container">
        <div class="upload-container">
            <h2>Unesi novu destinaciju</h2>
            <p>Unesi podatke</p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <span>Unesi mesto</span>
                <input type="text" name="place" id="place" placeholder="Mesto" required>
                <span>Unesi Naziv</span>
                <input type="text" name="name" id="name" placeholder="Naziv" required>
                <span>Unesi Opis</span>
                <textarea name="description" id="description" placeholder="Opis" required></textarea>
                <span>Unesi Cenu</span>
                <input type='number' step="any"name='price' placeholder='Unesi cenu' required>
                <span>Izaberi slike</span>
                <input type="file" name="files[]" multiple>
                <input type="submit" name="submit-upload" value="upload" class="btn" id="submit-upload">

            </form>

        </div>
    </div>




   
</body>

</html>