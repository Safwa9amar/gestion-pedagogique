<?php
include 'includes/config.php';
if (isset($_GET['deleteRow']) && $is_logged) {
    $id = $_GET['deleteRow'];
    deleteRow('clients', $id);
    echo "<script>window.location.href='?page=clients&sub_page=list_clients'</script>";
}
$all_clients = getAllClients();
$table_head = '
            <tr>
                <th>Nom du client</th>
                <th>code</th>
                <th>Téléphone</th>
                <th>email</th>
                <th>Wilaya/adresse</th>
                <th>Action</th>
            </tr>
    ';
?>
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Liste des clients</h4>
            <h6>Gérer vos clients</h6>
        </div>
        <div class="page-btn">
            <a href="addcustomer.html" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img">Add
                Customer</a>
        </div>
    </div>


    <div class="card">
        <div class="card">
            <div class="card-body">
                <?php include 'templates/components/list_table_head.php'; ?>
                <?php
                $num = mysqli_num_rows($all_clients);
                if ($num > 0) {
                    // loop through all_clients
                    while ($client = mysqli_fetch_assoc($all_clients)) {
                        $client_id = $client['id'];
                        $client_name = $client['name'];
                        $client_code = $client['code'];
                        $client_phone = $client['phone'];
                        $client_email = $client['mail'];

                        ?>
                        <tr>

                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="<?php echo $clients_upload_dir . $client['img']; ?>" alt="img">
                                </a>
                                <a href="javascript:void(0);">
                                    <h6>
                                        <?php echo $client_name; ?>
                                    </h6>
                                </a>
                            </td>
                            <td>
                                <?php echo $client_code; ?>
                            </td>
                            <td>
                                <?php echo $client_phone; ?>
                            </td>
                            <td>
                                <?php echo $client_email; ?>
                            </td>
                            <td>
                                <?php
                                $city = getWilayaById($client['city']);
                                echo $city['name'] . ' , ' . $client['address']; ?>
                            </td>
                            <td>
                                <a class="me-3" href="<?php echo "?page=clients&sub_page=edit_client&id=$client_id"; ?>">
                                    <img src="assets/img/icons/edit.svg" alt="img">
                                </a>
                                <a class="me-3 confirm-text"
                                    href="<?php echo "?page=clients&sub_page=list_clients&deleteRow=$client_id"; ?>">
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