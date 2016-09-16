<?php
namespace Instagram;

class InstagramPost extends aInstagram implements iInstagram {

  public function __construct(array $paramater) {
    parent::__construct($paramater);
  }

  public final function sendHttpHeader() {
    $ch = curl_init();
    $param = isset($this->getRawHttpHeader()['param'])?$this->getRawHttpHeader()['param']:array();
    $endpoint = isset($this->getRawHttpHeader()['endpoint'])?$this->getRawHttpHeader()['endpoint']:'';
    $url_send = $this->getApiBaseUrl().$endpoint;
    curl_setopt($ch, CURLOPT_URL, $url_send);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, count($param));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    $this->rawHttpResponse = json_decode(curl_exec($ch), true);
    curl_close($ch);
  }

  public final function getHttpResponse() {
    return $this->rawHttpResponse;
  }

}
