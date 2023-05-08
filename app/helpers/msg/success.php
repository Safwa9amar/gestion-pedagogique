<div style="
    position: fixed;
    bottom: 1rem;
    left: 1rem;
    z-index: 9999;
    " class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>
        <?php echo $app_lang['success'] ?>
    </strong>
    <?php echo $_SESSION['success'] ?><button id="closeMsg" type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
</div>

<script>
    // button closeMsg
    document.getElementById('closeMsg').addEventListener('click', function () {
        // remove the msg from session
        fetch('../api/removeMsg.php?type=success')
    });


</script>