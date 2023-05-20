<script src="<?php
// check if the app folder in  request url
if (strpos($_SERVER['REQUEST_URI'], 'app')) {
    echo '..' . DIRECTORY_SEPARATOR . urlFor('../' . JS, 'jquery-3.6.0.min.js', 24);

} else {
    echo urlFor(JS, 'jquery-3.6.0.min.js', 24);
}

?>"></script>
<script src="<?php
// check if the app folder in  request url
if (strpos($_SERVER['REQUEST_URI'], 'app')) {
    echo '..' . DIRECTORY_SEPARATOR . urlFor('../' . JS, 'jquery.slimscroll.min.js', 24);

} else {
    echo urlFor(JS, 'jquery.slimscroll.min.js', 24);
}

?>"></script>
<script src="<?php
// check if the app folder in  request url
if (strpos($_SERVER['REQUEST_URI'], 'app')) {
    echo '..' . DIRECTORY_SEPARATOR . urlFor('../' . JS, 'jquery.dataTables.min.js', 24);

} else {
    echo urlFor(JS, 'jquery.dataTables.min.js', 24);
}

?>"></script>
<script src="<?php
// check if the app folder in  request url
if (strpos($_SERVER['REQUEST_URI'], 'app')) {
    echo '..' . DIRECTORY_SEPARATOR . urlFor('../' . JS, 'feather.min.js', 24);

} else {
    echo urlFor(JS, 'feather.min.js', 24);
}

?>"></script>
<script src="<?php
// check if the app folder in  request url
if (strpos($_SERVER['REQUEST_URI'], 'app')) {
    echo '..' . DIRECTORY_SEPARATOR . urlFor('../' . JS, 'dataTables.bootstrap4.min.js', 24);

} else {
    echo urlFor(JS, 'dataTables.bootstrap4.min.js', 24);
}

?>"></script>
<script src="<?php
// check if the app folder in  request url
if (strpos($_SERVER['REQUEST_URI'], 'app')) {
    echo '..' . DIRECTORY_SEPARATOR . urlFor('../' . JS, 'bootstrap.bundle.min.js', 24);

} else {
    echo urlFor(JS, 'bootstrap.bundle.min.js', 24);
}
?>"></script>
<script src="<?php

// check if the app folder in  request url
if (strpos($_SERVER['REQUEST_URI'], 'app')) {
    echo '..' . DIRECTORY_SEPARATOR . urlFor('../' . JS, 'script.js', 24);

} else {
    echo urlFor(JS, 'script.js', 24);
}
?>"></script>
<script>
// get all input and add required attribute using jquery not file input
$('input:not([type="file"])').attr("required", "required");
$('input:not([type="file"])').attr("autocomplete", "false");
// get all textarea and add required attribute
$("textarea").attr("required", "required");
// get all select and add required attribute
$("select").attr("required", "required");
</script>