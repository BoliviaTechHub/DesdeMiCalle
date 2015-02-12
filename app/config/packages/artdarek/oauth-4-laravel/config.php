<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '391601977588709',
            'client_secret' => 'f20f76fc6a56ef90e81ea77f4ca1f47c',
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),		

	)

);