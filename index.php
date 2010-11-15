<?php
	
	/* Onliner Test */
	
	/* Version 1.0 */
	
	/* 1. Initialize error handler */
	error_essence::init();
	
	/* 2. Initialize session manager */
	session_essence::init();
	
	/* 3. Initilize configuration */
	config_essence::init();
	
	/* 4. Initialize request */
	request_essence::init();
	
	/* 5. Initialize pre filter */
	filter_essence::init('pre');
	
	/* 6. Initialize action */
	action_essence::init();
	
	/* 7. Initialize post filter */
	filter_essence::init('post');
	
?>