<?php

if(session_id() == '' || !isset($_SESSION)) {
	// session isn't started
	session_start();
	}

require_once( "../oc-config.php");
require_once( ABSPATH . '/oc-functions.php');
require_once( ABSPATH . '/oc-settings.php');
require_once( ABSPATH . "/oc-includes/generalActions.php");
require_once( ABSPATH . "/oc-includes/adminActions.php");
include_once( ABSPATH . "/" . OCCONTENT . "/plugins/api_auth.php" );

setDispatcher("1");

$adminButton = "";
$dispatchButton = "";
$highwayButton = "";
$stateButton = "";
$fireButton = "";
$emsButton = "";
$sheriffButton = "";
$policeButton = "";
$civilianButton = "";
$roadsideAssistButton = "";


    if ($_SESSION['state'] === 'YES')
    {
        $stateButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\"  href=\"".BASE_URL."/".OCAPPS."//mdt.php?dep=state\" class=\"btn btn-lg cusbtn animate fadeInLeft delay1\">State</a></li>";
    }
    if ($_SESSION['ems'] === 'YES')
    {
        $emsButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\" href=\"".BASE_URL."/".OCAPPS."/mdt.php?dep=ems\" class=\"btn btn-lg cusbtn animate fadeInLeft delay1\">EMS</a></li>";   
    }
    if ($_SESSION['fire'] === 'YES')
    {
        $fireButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\" href=\"".BASE_URL."/".OCAPPS."/mdt.php?dep=fire\" class=\"btn btn-lg cusbtn animate fadeInLeft delay1\">Fire</a></li>";
    }
    if ($_SESSION['highway'] === 'YES')
    {
        $highwayButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\" href=\"".BASE_URL."/".OCAPPS."/mdt.php?dep=highway\" class=\"btn btn-lg cusbtn animate fadeInLeft delay1\">Highway Patrol</a></li>";
    }
    if ($_SESSION['police'] === 'YES')
    {
        $policeButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\" href=\"".BASE_URL."/".OCAPPS."/mdt.php?dep=police\" class=\"btn btn-lg cusbtn animate fadeInLeft delay1\">Police Department</a></li>";
    }
    if ($_SESSION['sheriff'] === 'YES')
    {
        $sheriffButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\" href=\"".BASE_URL."/".OCAPPS."/mdt.php?dep=sheriff\" class=\"btn btn-lg cusbtn animate fadeInLeft delay1\">Sheriff's Office</a></li>";
    }
    if ($_SESSION['dispatch'] === 'YES')
    {
        $dispatchButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\" href=\"".BASE_URL."/".OCAPPS."/cad.php\">Dispatch<i class=\"nav-icon icon-pencil\"></i> </a></li>";
    } 
    if ($_SESSION['roadsideAssist'] === 'YES')
    {
        $roadsideAssistButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\"href=\"".BASE_URL."/".OCAPPS."/mdt.php?dep=roadesideAssist\" class=\"btn btn-lg cusbtn animate fadeInLeft delay1\">Roadside Assistance</a></li>";
    } else {}
    
    if ($_SESSION['civilianPrivilege'] === '1')
    {
        $civilianButton = "<li class=\"nav-item\" style=\"list-style: none;\"><a class=\"nav-link\" href=\"".BASE_URL."/".OCAPPS."/civilian.php\" class=\"btn btn-lg cusbtn animate fadeInLeft delay1\">Civilian Services</a></li>";
    }
    if ($_SESSION['adminPrivilege'] === '3')
    {
        $adminButton = "<a href=\"".BASE_URL."/oc-admin/admin.php\" class=\"btn btn-primary btn-md animate fadeInLeft delay1 \">Admin</a>";
    }
    if ($_SESSION['adminPrivilege'] === "2")
    {
        $adminButton = "<a href=\"".BASE_URL."/oc-admin/admin.php\" class=\"btnbtn-primary btn-md animate fadeInLeft delay1\">Moderator</a>";
    }

if (empty($_SESSION['logged_in']))
{
	header('Location: '.BASE_URL);
	die("Not logged in");
}
else
{
  // Do Nothing
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include ( ABSPATH . "/".OCTHEMES."/".THEME."/includes/header.inc.php"); ?>

  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
	<header class="app-header navbar">
	<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
		<span class="navbar-toggler-icon"></span>
	</button>
	<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
<span class="navbar-toggler-icon"></span>
</button>
	<?php include( ABSPATH . "/" .  OCCONTENT . "/themes/". THEME ."/includes/topProfile.inc.php"); ?>
	</header>
	<div class="app-body">
	  <div class="sidebar">
		<nav class="sidebar-nav">
		  <ul class="nav">
			<li class="nav-title"><?php echo lang_key("CIVILIAN_SERVICES"); ?></li>
				<ul>
					<?php echo $dispatchButton;?>
					<?php echo $civilianButton; ?>
				</ul>
			<li class="nav-title"><?php echo lang_key("LAW_ENFORCEMENT_SERVICES"); ?></li>
				<ul>
					<?php echo $sheriffButton;?>
					<?php echo $highwayButton;?>
					<?php echo $stateButton;?>
					<?php echo $policeButton;?>
				</ul>
			</li>

			<li class="divider"></li>
			<li class="nav-title"><?php echo lang_key("FIRST_RESPONDER_SERVICES"); ?></li>
			<ul>
				<?php echo $fireButton;?>
				<?php echo $emsButton;?>
			</ul>
		</ul>
		</nav>
	</div>
	<main class="main">
		<div class="container-fluid">
			<div class="animated fadeIn">
			<br />
			<?php if ( $_SESSION['adminPrivilege'] == 3 | $_SESSION['adminPrivilege'] == 2 ) {?>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<?php echo lang_key("ACCESS_REQUESTS"); ?>
						</div>
						<div class="card-body">
							<?php getPendingUsersReadOnly();?>
						</div>
						<div class="card-footer">
							<?php echo $adminButton; ?>
						</div>
					</div>
				</div>
				<!--/.col-->
			</div>
			<!--/.row-->
			<?php } else {} ?>

			
			<div class="row justify-content-center">
				<div class="col-md-12">	
					<div class="card">
						<div class="card-header">
							<?php echo lang_key("PATROL_STATUS"); ?> <button class="btn btn-primary" name="aop" data-target="#aop" id="getAOP" disabled></button>
						</div>
						<div class="card-body">
						<?php if (!empty(LIVEMAP_URL)) {?>
							<iframe src="<?php echo LIVEMAP_URL; ?>" height="500px" width="100%"></iframe>
						<?php } else {} ?>
						</div>
					</div>
				</div>
				<!--/.col-->
			</div>
			<!--/.row-->

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
	<?php include ( ABSPATH . "/oc-includes/jquery-colsolidated.inc.php"); ?>
<script type="text/javascript">
$(document).ready(function() {

      $(function() {
         $('#menu_toggle').click();
      });

		getAOP();
	});
function getAOP() {
   $.ajax({
         type: "GET",
         url: "../<?php echo OCINC ?>/generalActions.php",
         data: {
            getAOP: 'yes'
         },
         success: function(response)
         {
            $('#getAOP').html(response);

            // SG - Removed until node/real-time data setup
            /*$('#activeUsers').DataTable({
            searching: false,
            scrollY: "200px",
            lengthMenu: [[4, -1], [4, "All"]]
         });*/
            setTimeout(getAOP, 5000);


        },
        error : function(XMLHttpRequest, textStatus, errorThrown)
        {
    	    console.log("Error");
        }

    });
}


</script>
  </body>
</html>