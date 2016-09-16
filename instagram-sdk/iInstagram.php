<?php
namespace Instagram;

interface iInstagram{
  public function sendHttpHeader();
  public function getHttpResponse();
}
