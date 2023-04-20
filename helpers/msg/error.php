<!-- bootstrap error box -->
<div style="
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: 9999;
    " class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>
        <?php echo $lang['error'] ?>
    </strong>
    <?php echo $_SESSION['error'] ?><button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
</div>