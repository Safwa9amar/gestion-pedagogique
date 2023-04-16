<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrqp -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body style="
    display: flex;
    flex-wrap: wrap;
    padding: 20px;
">
    <?php
    include '../includes/config.php';
    // get all files in code folder
    $files = glob('code/*');
    foreach ($files as $file) {
        $file_name = basename($file);
        $code = str_replace('.svg', '', $file_name);
        echo "
        <div class='col-6 col-md-4 col-lg-3 p-2'>
            <div class='card'>
                <div class='card-body'>
                    <div class='d-flex justify-content-center'>
                         <img src='code/$file_name' alt='img'>
                    </div>
                </div>
                <div class='d-flex justify-content-center'>
                    <p class='text-center'>{$appName} {$code}</p>
                </div>    
            </div>
        </div>
        ";

    }

    ?>
</body>
<script>
    // print this page in pdf when user click on print button
    // landscape mode
    window.print();
    // check if user close the print dialog
    window.onafterprint = function () {
        // redirect to products page
        window.close();
    }


</script>

</html>