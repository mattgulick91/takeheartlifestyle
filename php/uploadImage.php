<?php

//Upload image to images folder and add info to database

$currentBlogImage = $_POST['current-blog-image'];
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["imageFile"]["name"]);
$uploadOk = 1;

echo '<form id="uploadForm" method="post" action="postImageToBlog.php"><input type="hidden" value="../' . $target_file . '" name="fileName"><input type="hidden" name="current-blog-image" value="'.$currentBlogImage.'"></form>';

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageFile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($target_file)){
?>

<script type="text/javascript">
  document.getElementById("uploadForm").submit();
</script>

<?php } ?>
