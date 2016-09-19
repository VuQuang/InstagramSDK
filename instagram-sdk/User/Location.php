<?php
namespace Instagram\User;

class Location {
    protected $medias;
    protected $locations = array();

    public function __construct(\Instagram\aInstagram $InstagramRequest, $endpoint_media_recent) {
        $InstagramRequest->setRawHttpHeader(array(
            'endpoint' => $endpoint_media_recent,
        ));
        $this->medias = $InstagramRequest->sendHttpHeader()->getHttpResponse()['data'];
        $medias = $this->medias;
        foreach ($medias as $value)
            array_push($this->locations, $medias['location']);
    }

    public  function getMedias() {
        return $this->medias;
    }

    public function getLocations() {
        return $this->locations;
    }

    public function getMostLocation() {

    }
}