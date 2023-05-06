<!-- bootstrap error box -->
<div style="
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 9999;
    " class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>
        <?php echo $app_lang['error'] ?>
    </strong>
    <?php echo $_SESSION['error'] ?><button id="closeErrMsg" type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
</div>

<script>
    // button closeErrMsg
    document.getElementById('closeErrMsg').addEventListener('click', function () {
        // remove the msg from session
        fetch('../api/removeMsg.php?type=error')
        
    });


</script>