<?php
namespace app\models;
/**
 * Class SoapClientCurl extends SoapClient __doRequest method with curl powered method
 */
class SoapClientCurl extends SoapClient{

	//Required variables
	public $url         = null;
	public $certfile    = null;
	public $keyfile     = null;
	public $passphrase  = null;

	//Overwrite constructor and add our variables
	public function __construct($wsdl, $options = array()){

		parent::__construct($wsdl, $options);

		foreach($options as $field => $value){
			if(!isset($this->$field)){
				$this->$field = $value;
			}
		}
	}

	/*
	 * Overwrite __doRequest and replace with cURL. Return XML body to be parsed with SoapClient
	 */
	public function __doRequest ($request, $location, $action, $version, $one_way = 0) {

		//Basic curl setup for SOAP call
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url); //Load from datasource
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml', 'SOAPAction: ""'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

		//SSL
		curl_setopt($ch, CURLOPT_SSLVERSION, 3); //=3
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSLCERT, $this->certfile);
		curl_setopt($ch, CURLOPT_SSLKEY, $this->keyfile);
		curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
		curl_setopt($ch, CURLOPT_SSLKEYPASSWD, $this->passphrase); //Load from datasource

		//Parse cURL response
		$response            = curl_exec ($ch);
		$this->curl_errorno  = curl_errno($ch);

		if ($this->curl_errorno == CURLE_OK) {
			$this->curl_statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		}
		$this->curl_errormsg  = curl_error($ch);

		//Close connection
		curl_close($ch);

		//Return response info
		return $response;
	}
}

?>