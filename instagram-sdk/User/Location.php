<?php
namespace Instagram\User;

class Location {
    protected $medias;
    protected $locations = array();
    protected $rawData;

    public function __construct(\Instagram\aInstagram $InstagramRequest, $endpoint_media_recent) {
        $InstagramRequest->setRawHttpHeader(array(
            'endpoint' => $endpoint_media_recent,
        ));
        $this->rawData = $InstagramRequest->sendHttpHeader()->getHttpResponse();
        $this->medias = $this->rawData['data'];
        if(!empty($this->rawData['pagination'])) {
            $next_url = $this->rawData['pagination']['next_url'];
            while (!empty($next_url)) {
                $InstagramRequest->setRawHttpHeader(array(
                    'endpoint' => $next_url,
                ));
                $next_data_url = $InstagramRequest->sendHttpHeader()->getHttpResponse();
                array_push($this->medias, $next_data_url['data']);
                $next_url = $next_data_url['pagination']['next_url'];
            }
        }

    }

    public  function getMedias() {
        return $this->medias;
    }

    public function getRawData() {
        return $this->rawData;
    }

    public function getLocations() {
        return $this->locations;
    }

    public function getMostLocation() {

    }
}