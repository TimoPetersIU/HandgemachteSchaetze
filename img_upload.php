<!DOCTYPE html>
<html>
<body>
<?php
$target = 'localhost/timo/hs_images/';
$target_data = $target . basename($_FILES['UploadFile']['name']);
if (move_uploaded_file($_FILES['UploadFile']['tmp_name'], $target_data)) {
    echo "DATA UPLOAD SUCCESSFUL";
} else {
    echo "UPLOAD FAILED";
}
?>
</body>
</html>
