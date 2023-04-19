<?php


function uploadImg($img, $img_destination)
{
    $img_name = $img['name'];
    $img_tmp_name = $img['tmp_name'];
    $img_size = $img['size'];
    $img_error = $img['error'];
    $img_type = $img['type'];

    $img_ext = explode('.', $img_name);
    $img_actual_ext = strtolower(end($img_ext));

    $allowed = array('jpg', 'jpeg', 'png');
    // check if directory exists
    $directory = "path/to/directory"; // Replace with the path to the directory you want to check/create

    if (!is_dir($img_destination)) {
        mkdir($img_destination, 0777, true); // Creates the directory with full permissions
    }

    // check if file is not empty

    if (!empty($img_name)) {

        if (in_array($img_actual_ext, $allowed)) {
            // check if file type is allowed
            if ($img_error === 0) {
                if ($img_size < 1000000) {
                    $img_new_name = uniqid('') . "." . $img_actual_ext;
                    $new_img_destination = $img_destination . $img_new_name;
                    move_uploaded_file($img_tmp_name, $new_img_destination);
                    // unlink old image using tornary operator

                    return $img_new_name;
                } else {
                    // echo "Your file is too big!";
                    return 1;
                }
            } else {
                // echo "There was an error uploading your file!";
                return 2;
            }
        } else {
            // echo "You cannot upload files of this type!";
            return 3;
        }
    } else {
        // echo "Please select a file!";
        return 4;
    }
}
