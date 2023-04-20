<?php

// upload word or pdf file to custom folder
function uploadFile($file, $folder)
{
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('pdf', 'docx', 'doc');

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 2097152) {
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = $folder . $file_name_new;
                if (move_uploaded_file($file_tmp, $file_destination)) {
                    return $file_name_new;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}