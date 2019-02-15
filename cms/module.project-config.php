<?php
$CONST["project_name"] = "AUTO-VISION";

// SITE SETTINGS ********************************************************************************************

// default css-table
$CONST["default_css_table"][] = "SYSCSS:/bootstrap.min.css";            // default css-table
$CONST["default_css_table"][] = "SYSCSS:/style.min.css";                // default css-table
$CONST["default_css_table"][] = "SYSLIB:/tinybox/tinybox.css";
$CONST["default_css_table"][] = "/client_styles.css";

//	CLIENT-SIDE LIBRARIES

if (strpos($_SERVER['REQUEST_URI'], '/admin/') === false) {

	$CONST["default_client_script"][] = "/cf.js";
	$CONST["default_client_script"][] = "SYSLIB:/bootstrap.min.js";
	$CONST["default_client_script"][] = "/fixed-search-thead.js";
	$CONST["default_client_script"][] = "/script.js";
	$CONST["default_client_script"][] = "SYSLIB:/search/search.js";

	$CONST['replaceSelect'] = true;

	$CONST["default_client_script"][] = "SYSLIB:/form/DateTimeBox.min.js";

	$CONST["default_client_script"][] = "SYSLIB:/tinybox/tinybox.js";
}

$CONST['useFixPeriod'] = true;

