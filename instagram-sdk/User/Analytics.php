<?php
namespace Instagram\User;

class Analytics extends Information {
    public function __construct(\Instagram\iInstagram $InstagramRequest) {
        parent::__construct($InstagramRequest);
    }

    public function counts($field) {
        return $this->userData['counts'][$field];
    }
}