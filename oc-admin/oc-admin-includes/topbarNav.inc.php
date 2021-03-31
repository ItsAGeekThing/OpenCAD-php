
    <ul class="nav navbar-nav">
        <li class="nav-item px-3" <?php if ( $pageName == "Dashboard") echo $currentPage; ?>><a href="<?php echo BASE_URL; ?>/oc-admin/admin.php" style="color:black"><i class="fas fa-home"  style="color:black"></i>  Dashboard</a></li>
        <?php if ( ( MODERATOR_USER_MANAGER == true && $_SESSION['adminPrivilege'] == 2 ) || ( $_SESSION['adminPrivilege'] == 3 ) )
        { ?>
        <li class="nav-item px-3" <?php if ( $pageName == "".lang_key("USER_MANAGER")."") echo $currentPage; ?>><a href="<?php echo BASE_URL; ?>/oc-admin/userManagement.php" style="color:black"><i class="fas fa-database fa-3px" style="color:black"></i> <?php echo lang_key("USER_MANAGER"); ?></a></li>
      <?php  } else { }?>
        <?php if ( ( MODERATOR_NCIC_EDITOR == true && $_SESSION['adminPrivilege'] == 2 ) || ( $_SESSION['adminPrivilege'] == 3 ) )
        { ?>
        <li class="nav-item px-3" <?php if ( $pageName == "".lang_key("NCIC_EDITOR")."") echo $currentPage; ?>><a href="<?php echo BASE_URL; ?>/oc-admin/ncicAdmin.php" style="color:black"><i class="fas fa-database fa-3px" style="color:black"></i> <?php echo lang_key("NCIC_EDITOR"); ?></a></li>
      <?php  } else { }?>
      <?php if ( ( MODERATOR_DATA_MANAGER == true && $_SESSION['adminPrivilege'] == 2 ) || ( $_SESSION['adminPrivilege'] == 3 ) )
        { ?>
        <li class="nav-item dropdown">
          <a class="nav-item dropdown-toggle" data-toggle="dropdown" href="#" role="tab" aria-haspopup="true" aria-expanded="false" style="color:black"><i class="fas fa-database" style="color:black"></i> <?php echo lang_key("DATA_MANAGER"); ?></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/citationTypeManager.php"; ?>"><i class="fas fa-exclamation-triangle"></i> <?php echo lang_key("CITATIONTYPE_MANAGER"); ?></a>
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/departmentsManager.php"; ?>"><i class="fas fa-exclamation-triangle"></i> <?php echo lang_key("DEPARTMENT_MANAGER"); ?></a>
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/incidentTypeManager.php"; ?>"><i class="fas fa-shield-alt"></i> <?php echo lang_key("INCIDENTTYPE_MANAGER"); ?></a>
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/radioCodeManager.php"; ?>"><i class="fas fa-shield-alt"></i> <?php echo lang_key("RADIOCODE_MANAGER"); ?></a>
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/streetManager.php"; ?>"><i class="fas fa-road"></i> <?php echo lang_key("STREET_MANAGER"); ?></a>
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/vehicleManager.php"; ?>"><i class="fas fa-motorcycle"></i> <?php echo lang_key("VEHICLE_MANAGER"); ?></a>
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/warningTypeManager.php"; ?>"><i class="fas fa-exclamation-triangle"></i> <?php echo lang_key("WARNINGTYPE_MANAGER"); ?></a>
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/warrantTypeManager.php"; ?>"><i class="fas fa-exclamation-triangle"></i> <?php echo lang_key("WARRANTTYPE_MANAGER"); ?></a>
            <a class="dropdown-item" href="<?php echo BASE_URL . "/oc-admin/dataManagement/weaponManager.php"; ?>"><i class="fas fa-shield-alt"></i> <?php echo lang_key("WEAPON_MANAGER"); ?></a>
            <a class="dropdown-item" <?php if (MODERATOR_DATAMAN_IMPEXPRES == false) echo "onclick=\"return false\""; ?> type="button" data-toggle="modal" data-target="#dataManager"> <i class="fas fa-database"></i> Import/Export/Reset</a>
          </div>
        </li>
        <?php  } else { }?>
        <li class="nav-item px-3"<?php if ( $pageName == "" . lang_key("ABOUT_OPENCAD") . "") echo $currentPage; ?>><a href="<?php echo BASE_URL; ?>/oc-admin/about.php"  style="color:black"><i class="fas fa-info-circle fa-3px" style="color:black"></i> <?php echo lang_key("ABOUT_OPENCAD"); ?></a></li>

    </ul>