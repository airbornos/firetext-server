<?php

if ((isset($_POST) && !empty($_POST)) or (isset($_GET) && !empty($_GET))) {
	if($_GET['request']=='firetext_variables'){
		// Firetext 0.5+
		// Variable container
		$firetextVariables = [];
		
		// Cloud services
		$firetextVariables["services"] = [];
		
		// Dropbox config
		$firetextVariables["services"]["dropbox"] = [
			"authURL"=>"https://firetext-server.herokuapp.com/auth/dropbox/oauth2/",
			"apiKey"=>"p8qpg4ai84mfayx"
		];
		
		// Splunk config
		$firetextVariables["services"]["splunk"] = [
			"apiKey"=>""
		];
		
		// In-app urls
		$firetextVariables["urlCategories"] = [
				];
		$firetextVariables["urls"] = [
					[
						"id"=>"rate-firetext",
						"name"=>"Rate Firetext",
						"url"=>"https://marketplace.firefox.com/app/firetext/ratings/add",
						"category"=>""
					]
				];
		
		// Notifications
		$firetextVariables["notifications"] = [];
		if($_POST["locale"] == "en") {
			array_push($firetextVariables["notifications"],[
				"name"=>"test",
				"content"=>"want-feedback",
				"repeat"=>2
			]);
		}
	
		// Echo variables
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
		echo json_encode($firetextVariables);
		exit;		
	} else if($_POST['request']=='urls') {
		// Firetext 0.4-
		// Dropbox config
		$dropboxURL = 'https://firetext-server.herokuapp.com/auth/dropbox/';
		
		// Create variables
		$urls = array(
					"about"=>"",
					"credits"=>"",
					"support"=>"",
					"rate"=>"https://marketplace.firefox.com/app/firetext/ratings/add",
					"dropboxAuth"=>$dropboxURL
				);
	
		// Echo variables
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
		echo json_encode($urls);
		exit;
	}
} else {
	echo "Firetext server";
}
