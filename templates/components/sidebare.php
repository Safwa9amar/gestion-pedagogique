<?php
$page = $_GET['page'];
$sub_page = $_GET['sub_page'] ?? '';
?>
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="active">
          <a href="./"><img src="assets/img/icons/dashboard.svg" alt="img" /><span>
              Dashboard</span>
          </a>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img" /><span>
              Produit</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li>
              <a href="?page=produits&sub_page=list_product"
                class="<?php echo $sub_page == 'list_product' || $sub_page == 'product_details' || $sub_page == "edit_product" ? 'active' : '' ?>">Liste
                de produits</a>
            </li>
            <li>
              <a href="?page=produits&sub_page=add_product"
                class="<?php echo $sub_page == 'add_product' ? 'active' : '' ?>">Ajouter un produit</a>
            </li>
            <li>
              <a href="?page=produits&sub_page=list_categories"
                class="<?php echo $sub_page == 'list_categories' || $sub_page == 'edit_category' ? 'active' : '' ?>">Liste
                des catégories</a>
            </li>
            <li>
              <a href="?page=produits&sub_page=add_category"
                class="<?php echo $sub_page == 'add_category' ? 'active' : '' ?>">ajouter une catégorie</a>
            </li>
            <!-- <li><a href="subcategorylist.html">Liste des sous-catégories</a></li> -->
            <!-- <li><a href="subaddcategory.html">Ajouter une sous-catégorie</a></li> -->
            <li>
              <a href="?page=produits&sub_page=list_marques"
                class="<?php echo $sub_page == 'list_marques' ? 'active' : '' ?>">Liste des marques</a>
            </li>
            <li>
              <a href="?page=produits&sub_page=add_marques"
                class="<?php echo $sub_page == 'add_marques' ? 'active' : '' ?>">Ajouter une marque</a>
            </li>
            <!-- <li><a href="importproduct.html">Import Products</a></li> -->
            <li>
              <a href="?page=produits&sub_page=print_barecode">Imprimer le code-barres</a>
            </li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/sales1.svg" alt="img" /><span>
              Ventes</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li>
              <a href="?page=ventes&sub_page=list_sales"
                class="<?php echo $sub_page == 'list_sales' ? 'active' : '' ?>">Liste des ventes</a>
            </li>
            <!-- <li>
              <a href="?page=ventes&sub_page=add_sales"
                class="<?php echo $sub_page == 'add_sales' ? 'active' : '' ?>">POS</a>
            </li> -->
            <li>
              <a href="?page=ventes&sub_page=add_sales"
                class="<?php echo $sub_page == 'add_sales' ? 'active' : '' ?>">Nouvelles ventes</a>
            </li>
            <!-- <li><a href="salesreturnlists.html">Sales Return List</a></li> -->
            <!-- <li><a href="createsalesreturns.html">Nouveau retour de vente</a></li> -->
          </ul>
        </li>
        <!-- <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img" /><span>
              Achat</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li>
              <a href="?page=achats&sub_page=list_achats"
                class="<?php echo $sub_page == 'list_achats' ? 'active' : '' ?>">Purchase List</a>
            </li>
            <li>
              <a href="?page=achats&sub_page=add_achats"
                class="<?php echo $sub_page == 'add_achats' ? 'active' : '' ?>">Ajouter un achat</a>
            </li>
          </ul>
        </li> -->

        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img" /><span>
              Clients</span>
            <span class="menu-arrow"></span></a>
          <ul>
            <li>
              <a href="?page=clients&sub_page=list_clients"
                class="<?php echo $sub_page == 'list_clients' ? 'active' : '' ?>">Liste de clients</a>
            </li>
            <li>
              <a href="?page=clients&sub_page=add_clients"
                class="<?php echo $sub_page == 'add_clients' ? 'active' : '' ?>">Ajouter un client
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>