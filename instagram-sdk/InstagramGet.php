<?php
namespace Instagram;

class InstagramGet extends aInstagram implements iInstagram {

  public function __construct(array $paramater){
    parent::__construct($paramater);
  }

  public final function sendHttpHeader() {
    $ch = curl_init();
    $endpoint = isset($this->getRawHttpHeader()['endpoint'])?$this->getRawHttpHeader()['endpoint']:'';
    $url_send = $this->getApiBaseUrl().$endpoint.'?access_token='.$this->getAccessToken();
    if(isset($this->getRawHttpHeader()['param'])) {
      foreach ($this->getRawHttpHeader()['param'] as $key => $value)
        $url_send = $url_send.$key.'='.$value;
    }
    curl_setopt($ch, CURLOPT_URL, $url_send);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $this->rawHttpResponse = json_decode(curl_exec($ch), true);
    curl_close($ch);
  }

  public final function getHttpResponse() {
    return $this->rawHttpResponse;
  }
}
