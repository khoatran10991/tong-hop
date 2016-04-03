<?php
 class Comodo {
 
   protected $decode_url = "http://secure.comodo.net/products/!DecodeCSR";
   protected $auto_apply_ssl_url = "https://secure.comodo.net/products/!AutoApplySSL";
   protected $auto_revoke_ssl_url = "https://secure.comodo.net/products/!AutoRevokeSSL";
   public $csr = '-----BEGIN CERTIFICATE REQUEST-----
MIIC5TCCAc0CAQAwgZ8xCzAJBgNVBAYTAlZOMRQwEgYDVQQIDAtOYW0gVHUgTGll
bTEPMA0GA1UEBwwGSGEgTm9pMRQwEgYDVQQKDAtHb2xkIFNlYXNvbjELMAkGA1UE
CwwCSVQxGjAYBgNVBAMMEWdvbGRzZWFzb24yNDcuY29tMSowKAYJKoZIhvcNAQkB
Fht3ZWJtYXN0ZXJAZ29sZHNlYXNvbjI0Ny5jb20wggEiMA0GCSqGSIb3DQEBAQUA
A4IBDwAwggEKAoIBAQCcnve+MWFwzdaYomvhHtre15oTPMOUswCrKL8m9PaoVJuJ
DQ2MiyhNGoklpLr9OE13A2dppyyEKe2YgXObsYXYi8chkZY6GkoKKaEkJ28V+3qt
bD/ktUZfeD1X3OjBtX0X++J0aeWCfTYcUEPxXCItdyCyXwL7CLvCKq5YGRsGZd2D
9Rd5sN1foxZIKcljZjH0gLczszxvIERXpo7x1eO6ceBjuTK/2+KEdsNQbTPMpLqP
M3nOfR4F+nff7sb3Vo+bSUOd4RgjapgKBPjwEOiw53ZyyOUo46t75W3xY3UK9mGX
Ozwrd8ov1eWWMxK+6swvZ6YycKl+5/chc9m+to/jAgMBAAGgADANBgkqhkiG9w0B
AQsFAAOCAQEAWObQnV+0xssBSUDssxFvB5PR5bAykBxa8wZ6PIl9NS1E3eqlGPPy
2q4e9dxDp3ayFcvAvG/4KoGRjefWOYr7fPTQwNKTy4MZSeXZ8NFJjSDD07blPTy5
MOitsum3QNdJEYV/QYlDX1vE9wd3SqHfO5CtKJjHjqh96LHC9QNFQoHwKq9jRO2P
FyeDdOH4kqRslwLODKhx2MtL0puDFbCM64Xx4gqrumqY8O5SFuflaFbDa9aNdRfB
D8B3Q0np7eV+4zljinK1wZ1kgxbuvdZqzlVO4XIsSfBRCcMz+Yj1dOGRzjz/XQoH
OmCXwi003tOiLiKINeXJ9t3Ix5OGyRvzsQ==
-----END CERTIFICATE REQUEST-----';	
   
   public function decode_csr($csr, $options = false) {
     $fields = array(
       "csr"               => $csr,
       "showErrorMessages" => "Y",
       "showSANDNSNames"   => "Y",
       "countryNameType"   => "FULL",
     );
     # http_build_query encodes uri-parameters for the request.
     #$request = "$this->decode_url?".http_build_query($fields);
     $request = http_build_query($fields);
     $response = $this->get($this->decode_url, $request);
     var_dump($response);
     $response_array = $this->parse_http_response($response);
     return $response_array;
   }
 
   # this revokes a certificate at comodo. it takes a list of options that is merged
   # with some default-options.
   public function auto_revoke_ssl($options) {
     # options must look something like this:
     $default_options = Array(
       "loginName"       => "",
       "loginPassword"   => "",
       "orderNumber"     => "",
       "revocationReason" => "",
       "responseFormat"  => "0",
     );
     $options = array_merge($default_options, $options);
     $response = $this->get($this->auto_revoke_ssl_url, http_build_query($options));
     #print_r($response);
     $parsed_response = $this->parse_response($response);
     #print_r($parsed_response);
     return $parsed_response;
   }
 
   # this orders a certificate at comodo. it takes a list of options that is merged
   # with some default-options.
   public function auto_apply_ssl($options) {
     # options must look something like this:
     $default_options = array(
       "loginName" => "mysoftvn",
       "loginPassword" => "h3MWbY6v",
       "product" => 43,
       "days" => 30,
       "serverSoftware" => 2,
       "domainNames" => "goldseason247.com",
       "primaryDomainName" => "",
       "csr" => $this->csr,
       "isCustomerValidated" => "Y",
       "organizationName" => "Mysoftvn",
       "streetAddress1" => "01 Ho Tung Mau",
       "localityName" => "Ha Noi",
       "stateOrProvinceName" => "HN",
       "postalCode" => "110000",
       "countryName" => "VN",
       "emailAddress" => "sangnguyendev@gmail.com",
       "showCertificateState" => "Y",
		"test" => "Y"
     );
     $options = array_merge($default_options, $options);
     #print_r($options);
     $response = $this->post($this->auto_apply_ssl_url, http_build_query($options));
     $parsed_response = $this->parse_response($response);
     #print_r($parsed_response);
     return $parsed_response;
   }
 
   # this builds a post-body
   private function http_build_post($array) {
     $body = "";
     foreach ($array as $key => $value) {
       $body .= "$key=".urlencode($value)."\n";
     }
     return $body;
   }
 
   # parse an auto_apply_ssl or auto_revole_ssl response, which is quite different from the csr response.
   private function parse_response($response = "") {
     $result = Array("errors" => 0);
     $responses = explode("\n", $response);
	 echo "<pre>";
     print_r($responses);
	 echo "</pre>";
     # return-status of 0 means everything went allright. now store the order_number and go home.
     if ($responses[0] == 0) {
       $result["order_number"] = $responses[1];
     }
     else {
       $result["errors"] = 1;
       $result["error_messages"] = $responses[1];
       
     }
     return $result;
   }
 
   # gets an http post response from comodo and creates an associative array including
   # all error messages that could happen in a special errors_field
   private function parse_http_response($response = "") {
     $result = array();
     if (!empty($response)) {
       $responses = explode("\n", $response);
       $errors = array_shift($responses);
       $result["_errors"]["_counter"] = $errors[0];
       foreach ($responses as $r) {
         # in some cases the first argument can be an error.
         if (preg_match("/^\-(\d+) (.*)$/", $r, $matches)) {
           $result["_errors"][$matches[1]] = $matches[2];
         }
         else {
           $explosion = explode("=",$r);
           # assign key / value pair from the string separation if the value is non-empty
           if (isset($explosion[1])) {
             $result[$explosion[0]] = $explosion[1];
           }
           else {
		
              print_r($explosion[0]);
			
           }
         }
       }
     }
     return $result;
   }
 
   # posts the body to the website in the url
   private function post($url, $options) {
     $curl = curl_init($url);
     curl_setopt($curl, CURLOPT_HEADER, false);  # DO NOT RETURN HTTP HEADERS
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  # RETURN THE CONTENTS OF THE CALL
     curl_setopt($curl, CURLOPT_POST, true);  # RETURN THE CONTENTS OF THE CALL
     curl_setopt($curl, CURLOPT_POSTFIELDS, $options);  # RETURN THE CONTENTS OF THE CALL
     return curl_exec($curl);
   }
 
   # gets the getter string to the website in the url
   private function get($handler, $request) {
     $curl = curl_init($handler .'?'. $request);
     #curl_setopt($curl, CURLOPT_POST, TRUE);  # Post data
     #curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
     curl_setopt($curl, CURLOPT_HEADER, FALSE);  # DO NOT RETURN HTTP HEADERS
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);  # RETURN THE CONTENTS OF THE CALL
     $response = curl_exec($curl);
     echo "<pre>";
     print_r(curl_getinfo($curl));
     echo "</pre>";
     curl_close($curl);
     return $response;
   }
 }
 

 
  $c = new Comodo;
  // print_r($c->decode_csr("$csr_niif"));
  $loginName = 'mysoftvn';
  $loginPassword = 'h3MWbY6v';

   	$a =  $c->auto_apply_ssl(Array("loginName" => $loginName, "loginPassword" => $loginPassword));
   	echo "<pre>"; 
   	print_r($a);
   	echo "<pre>";
   	 // $c->auto_revoke_ssl(Array("orderNumber" => "$orderNumber", "loginName" => "$loginName", "loginPassword" => "$loginPassword", "revocationReason" => "this is a test")); 