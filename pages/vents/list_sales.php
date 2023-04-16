<?php
include 'includes/config.php';
if (isset($_GET['deleteRow']) && $is_logged) {
    $id = $_GET['deleteRow'];
    deleteRow('achats', $id);
    echo "<script>window.location.href='?page=ventes&sub_page=list_sales'</script>";
}
$all_achats = getAllAchats();
$table_head = '
        <tr>
            <th>Nom du client</th>
            <th>Référence</th>
            <th>Date</th>
            <th>Statut</th>
            <th>Total général</th>
            <th>Action</th>
        </tr>
    ';
?>

<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Liste des ventes</h4>
            <h6>Gérez vos ventes</h6>
        </div>
        <div class="page-btn">
            <a href="?page=ventes&sub_page=add_sales" class="btn btn-added">
                <img src="assets/img/icons/plus.svg" alt="img">Add New Purchases
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card">
            <div class="card-body">
                <?php include 'templates/components/list_table_head.php'; ?>
                <?php
                $num = mysqli_num_rows($all_achats);
                if ($num > 0) {
                    // loop through all_achats
                    while ($achat = mysqli_fetch_assoc($all_achats)) {
                        $achat_id = $achat['id'];
                        $achat_supplier = $achat['Supplier'];
                        $achat_reference = $achat['Reference'];
                        $achat_date = $achat['Date'];
                        $achat_status = $achat['Status'];
                        $achat_grand_total = $achat['Grand_Total'];

                        ?>
                        <tr>

                            <td class="text-bolds">
                                <?php echo getRowById('fournisseurs', $achat_supplier)['name']; ?>
                            </td>
                            <td>
                                <?php echo $achat_reference; ?>
                            </td>
                            <td>
                                <?php echo $achat_date; ?>
                            </td>
                            <td>
                                <?php
                                if ($achat_status) {
                                    badge('lightgreen', 'Complété');
                                } else {
                                    badge('lightred', 'En attente');
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $achat_grand_total; ?>
                            </td>


                            <td>
                                <a class="me-3" href="?page=ventes&sub_page=edit_vent&editRow=<?php echo $achat_id; ?>">
                                    <img src="assets/img/icons/edit.svg" alt="img">
                                </a>
                                <a class="me-3 confirm-text"
                                    href="?page=ventes&sub_page=list_sales&deleteRow=<?php echo $achat_id; ?>">
                                    <img src="assets/img/icons/delete.svg" alt="img">
                                </a>
                            </td>
                        </tr>
                    <?php }
                } ?>
                <?php include 'templates/components/list_table_footer.php'; ?>

            </div>
        </div>
    </div>

</div>