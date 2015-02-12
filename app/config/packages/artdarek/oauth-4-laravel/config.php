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
            'client_id'     => '1547130082232999',
            'client_secret' => '8f1a8f57b9e0c4e67a702672b9f4a55b',
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),		

	)

);