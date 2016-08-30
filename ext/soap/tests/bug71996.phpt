--TEST--
Bug #71996: Using references in arrays doesn't work like expected
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php

$client = new class(null, ['location' => '', 'uri' => 'http://example.org']) extends SoapClient {
    public function __doRequest($request, $location, $action, $version, $one_way = 0) {
        echo $request;
        return '';
    }
};
$ref = array("foo");
$data = array(&$ref);
$client->foo($data);

?>
--EXPECT--
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://example.org" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:foo><param0 SOAP-ENC:arrayType="SOAP-ENC:Array[1]" xsi:type="SOAP-ENC:Array"><item SOAP-ENC:arrayType="xsd:string[1]" xsi:type="SOAP-ENC:Array"><item xsi:type="xsd:string">foo</item></item></param0></ns1:foo></SOAP-ENV:Body></SOAP-ENV:Envelope>
