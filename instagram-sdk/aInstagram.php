<?php
namespace Instagram;

abstract class aInstagram{
  protected $APP_ID;
  protected $APP_SECRET;
  protected $ACCESS_TOKEN;
  protected $API_BASE_URL;
  protected $rawHttpHeader;
  protected $rawHttpResponse;

  public function __construct(array $paramater){
    $this->setAppId($paramater['APP_ID']);
    $this->setAppSecret($paramater['APP_SECRET']);
    $this->setAccessToken($paramater['ACCESS_TOKEN']);
    $this->setApiBaseUrl($paramater['API_BASE_URL']);
  }

  public function setAppId($APP_ID) {
    $this->APP_ID = $APP_ID;
  }

  public function getAppId() {
    return $this->APP_ID;
  }

  public function setAppSecret($APP_SECRET) {
    $this->APP_SECRET = $APP_SECRET;
  }

  public function getAppSecret() {
    return $this->APP_SECRET;
  }

  public function setAccessToken($ACCESS_TOKEN) {
    $this->ACCESS_TOKEN = $ACCESS_TOKEN;
  }

  public function getAccessToken() {
    return $this->ACCESS_TOKEN;
  }

  public function setApiBaseUrl($API_BASE_URL) {
    $this->API_BASE_URL = $API_BASE_URL;
  }

  public function getApiBaseUrl() {
    return $this->API_BASE_URL;
  }

  public function setRawHttpHeader(array $rawHttpHeader) {
    $this->rawHttpHeader = $rawHttpHeader;
  }

  public function getRawHttpHeader() {
    return $this->rawHttpHeader;
  }
}
