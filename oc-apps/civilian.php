<?php

/**

Open source CAD system for RolePlaying Communities.
Copyright (C) 2017 Shane Gill

This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

This program comes with ABSOLUTELY NO WARRANTY; Use at your own risk.
**/

    if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
    }
    require_once('../oc-config.php');
    require_once( ABSPATH . '/oc-functions.php');
    require_once( ABSPATH . '/oc-settings.php');
    require_once( ABSPATH . "/" . OCINC . '/civActions.php');
    require_once( ABSPATH . "/" . OCINC . '/generalActions.php');
    require_once( ABSPATH . "/" . OCINC . '/publicFunctions.php');

    if (empty($_SESSION['logged_in']))
    {
        header('Location: ../index.php');
        die("Not logged in");
    }
    else
    {
      $name = $_SESSION['name'];
    }


    $civName = $civDob = $civAddr = "";



    $good911 = "";
    if(isset($_SESSION['good911']))
    {
        $good911 = $_SESSION['good911'];
        unset($_SESSION['good911']);
    }

    $identityMessage = "";
    if(isset($_SESSION['identityMessage']))
    {
        $identityMessage = $_SESSION['identityMessage'];
        unset($_SESSION['identityMessage']);
    }

    $plateMessage = "";
    if(isset($_SESSION['plateMessage']))
    {
        $plateMessage = $_SESSION['plateMessage'];
        unset($_SESSION['plateMessage']);
    }

    $nameMessage = "";
    if(isset($_SESSION['nameMessage']))
    {
        $nameMessage = $_SESSION['nameMessage'];
        unset($_SESSION['nameMessage']);
    }
    $weaponMessage = "";
    if(isset($_SESSION['weaponMessage']))
    {
        $weaponMessage = $_SESSION['weaponMessage'];
        unset($_SESSION['weaponMessage']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include ( ABSPATH . "/".OCTHEMES."/".THEME."/includes/header.inc.php"); ?>


<body class="app header-fixed">

    <header class="app-header navbar">

      
      <?php include( ABSPATH . "/" .  OCCONTENT . "/themes/". THEME ."/includes/civNav.inc.php"); ?>
      <?php include( ABSPATH . "/" .  OCCONTENT . "/themes/". THEME ."/includes/topProfile.inc.php"); ?>
      
    </header>

	<div class="app-body">
		<main class="main">
			<div class="breadcrumb" />
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-align-justify"></i> <?php echo lang_key("MY_IDENTITIES"); ?>
						</div>
                        <div class="card-body">
							<?php echo $nameMessage, $identityMessage;?>
							<?php ncicGetNames();?>
                        </div>
                        <!-- /.row-->
                    </div>
                </div>
            <!-- /.card-->
            </div>

			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-align-justify"></i> <?php echo lang_key("MY_VEHICLES"); ?>
						</div>
              			<div class="card-body">
							<?php echo $plateMessage;?>
							<?php ncicGetPlates();?>
		                </div>
        	        	<!-- /.row-->
						
		            </div>
        	    </div>
            <!-- /.card-->
			</div>

			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-align-justify"></i> <?php echo lang_key("MY_WEAPONS"); ?>
						</div>
              			<div class="card-body">
							<?php echo $weaponMessage;?>
							<?php ncicGetWeapons();?>
		                </div>
        	        	<!-- /.row-->
						
		            </div>
        	    </div>
            <!-- /.card-->
			</div>

        </main>

        </div>
        <footer class="app-footer">
            <div>
                <a href="https://opencad.io">OpenCAD</a>
                <span>&copy; 2017 <?php echo date("Y"); ?>.</span>
            </div>
            <div class="ml-auto">

            </div>
        </footer>

		<?php
        include ( ABSPATH . "/oc-includes/jquery-colsolidated.inc.php");
        include ( ABSPATH . "/" . OCCONTENT . "/themes/". THEME . "/modals/civilian.modals.inc.php");
        ?>
        
	</body>

    <script type="text/javascript" src="<?php echo BASE_URL . "/" . OCCONTENT . "/themes/". THEME . "/js/civilian.inc.js";?>"></script>
    <script type="text/javascript" src="https://jira.opencad.io/s/a0c4d8ca8eced10a4b49aaf45ec76490-T/-f9bgig/77001/9e193173deda371ba40b4eda00f7488e/2.0.24/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?locale=en-US&collectorId=ede74ac1"></script>

</html>