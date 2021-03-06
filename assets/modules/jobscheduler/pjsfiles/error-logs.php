<?php
$app_name = "phpJobScheduler";
$phpJobScheduler_version = "3.9";
// -------------------------------
define('MODX_API_MODE', true);
include_once(dirname(__FILE__)."../../../../../index.php");
$modx->db->connect();
if (empty ($modx->config)) {
    $modx->getSettings();
}
$modx_root_dir =$modx->config['base_path'];
$mods_path = $modx->config['base_path'] . "assets/modules/";
$site_name = preg_replace('/[^a-zA-Z0-9]+/', '_', $modx->config['site_name']);
$result = $modx->db->select('id', $modx->getFullTableName("site_modules"), "name='JobScheduler' AND disabled=0");
$module_id = $modx->db->getValue($result);

include_once("functions.php");

$headerout ='<html>
<head>
<title>JobScheduler - Tasks </title>
	<link rel="stylesheet" type="text/css" href="../../../../manager/media/style/MODxRE2/style.css" />

    <link rel="stylesheet" href="../../../../manager/media/style/common/font-awesome/css/font-awesome.min.css" />
<script src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/tabpane.js"></script>
<script src="functions.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
<h1 class="pagetitle">
  <span class="pagetitle-icon">
    <i class="fa fa-clock-o"></i>
  </span>
  <span class="pagetitle-text">
   JobScheduler - Tasks
  </span>
</h1>
<div id="actions">
    <ul class="actionButtons">
        <li id="Button5"><a href="../../../../manager/index.php?a=112&id='.$module_id.'">Back</a></li>
        <li id="Button5"><a href="../../../../manager/index.php?a=2">Close</a></li>
    </ul>
</div>
<div class="sectionBody">  
<div class="tab-pane" id="tab-pane-1">

   <div class="tab-page">
      <h2 class="tab"><i class="fa fa-clock-o" aria-hidden="true" id="ManageTasks"></i> Manage Tasks</h2></h2>
<div align="center">
  <center>
 <a class="btn btn-default" href="./"><i class="fa fa-clock-o fa-lg"></i> Scheduled tasks</a> <a class="btn btn-default" href="./?add=1"><i class="fa fa-plus-circle fa-lg"></i> Add a NEW schedule</a> <a class="btn btn-default" href="error-logs.php"><i class="fa fa-exclamation-circle fa-lg"></i> View error-logs</a><br>
</strong>  <br>
  </center>
</div>';
echo $headerout;
include("error-logs.html");
include("footer.html");
?>