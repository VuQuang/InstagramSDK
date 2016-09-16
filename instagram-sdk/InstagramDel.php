<?php
namespace Instagram;

class InstagramDel extends aInstagram implements iInstagram {

  public function __construct(array $paramater) {
    parent::__construct($paramater);
  }

  public final function sendHttpHeader() {
    $ch = curl_init();
    $endpoint = isset($this->getRawHttpHeader()['endpoint'])?$this->getRawHttpHeader()['endpoint']:'';
    $url_send = $this->getApiBaseUrl().$endpoint.'?access_token='.$this->getAccessToken();
    curl_setopt($ch, CURLOPT_URL, $url_send);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: DELETE') );
    curl_setopt($ch, CURLOPT_POSTFIELDS, array());
    $this->rawHttpResponse = json_decode(curl_exec($ch), true);
    curl_close($ch);
  }

  public final function getHttpResponse()
  {
      return $this->rawHttpResponse;
  }

}
