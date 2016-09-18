<?php
namespace Instagram\User;

class Information {
    protected $rawData;
    protected $userData;

    public function __construct(\Instagram\iInstagram $InstagramRequest) {
        $this->setRawData($InstagramRequest->sendHttpHeader()->getHttpResponse());
        $this->setUserData();
    }

    public function setRawData($rawData) {
        $this->rawData = $rawData;
    }

    public function setUserData($userData = 'data') {
        $this->userData = $this->rawData[$userData];
    }

    public function getUserData() {
        return $this->userData;
    }

    public function getField($field) {
        return isset($this->userData[$field])?$this->userData[$field]:NULL;
    }
}