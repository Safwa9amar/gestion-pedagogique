<script src="<?php echo urlFor(JS,'jquery-3.6.0.min.js') ?>"></script>
<script src="<?php echo urlFor(JS,'jquery.slimscroll.min.js') ?>"></script>
<script src="<?php echo urlFor(JS,'feather.min.js') ?>"></script>
<script src="<?php echo urlFor(JS,'dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo urlFor(JS,'bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo urlFor(JS,'script.js') ?>"></script>
<script>
    // get all input and add required attribute using jquery not file input
    $('input:not([type="file"])').attr('required', 'required');
    // get all textarea and add required attribute
    $('textarea').attr('required', 'required');
    // get all select and add required attribute
    $('select').attr('required', 'required');

</script>