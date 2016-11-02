<?php 

class SoapClient {
/* Methods */
public mixed __call ( string $function_name , string $arguments )
public SoapClient ( mixed $wsdl [, array $options ] )
public string __doRequest ( string $request , string $location , string $action , int $version [, int $one_way = 0 ] )
public array __getFunctions ( void )
public string __getLastRequest ( void )
public string __getLastRequestHeaders ( void )
public string __getLastResponse ( void )
public string __getLastResponseHeaders ( void )
public array __getTypes ( void )
public void __setCookie ( string $name [, string $value ] )
public string __setLocation ([ string $new_location ] )
public bool __setSoapHeaders ([ mixed $soapheaders ] )
public mixed __soapCall ( string $function_name , array $arguments [, array $options [, mixed $input_headers [, array &$output_headers ]]] )
public SoapClient ( mixed $wsdl [, array $options ] )
}

?>