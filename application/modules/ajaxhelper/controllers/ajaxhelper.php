<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxhelper extends CI_Controller {
	
	
	function index()
	{
		
	//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
				pr("masuk");exit;
 		}
		else
		{
			redirect("login");
		}
	}
	function GetInstagram()
	{
		
	//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$access_token = 'YOUR ACCESS TOKEN';
				$tag = 'mamahsh0p';
				$return = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/tags/' . $tag . '/media/recent?access_token=' . $access_token);

				//var_dump( $return ); // if you want to display everything the function returns

				foreach ( $return->data as $post ) {


				}
			}
			else
			{
				redirect("login");
			}
	
	}

	function rudr_instagram_api_curl_connect( $api_url ){
		$connection_c = curl_init(); // initializing
		curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
		curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
		curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
		$json_return = curl_exec( $connection_c ); // connect and get json data
		curl_close( $connection_c ); // close connection
		return json_decode( $json_return ); // decode and return
	}



	
}
