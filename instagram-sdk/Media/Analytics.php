<?php
namespace Instagram\Media;

class Analytics {
    protected $rawData;
    protected $medias = array();

    public function __construct(\Instagram\aInstagram $InstagramRequest) {
        $this->rawData = $InstagramRequest->sendHttpHeader()->getHttpResponse();
        $this->medias = $this->rawData['data'];
        if(!empty($this->rawData['pagination'])) {
            $next_url = $this->rawData['pagination']['next_url'];
            while(!empty($next_url)) {
                $InstagramRequest->setRawHttpHeader(array(
                    'endpoint' => $next_url
                ));
                $next_url_data = $InstagramRequest->sendHttpHeader()->getHttpResponse();
                array_push($this->medias, $next_url_data['data']);
                $next_url = $next_url_data['pagination']['next_url'];
            }
        }
    }

    public function getRawData(){
        return $this->rawData;
    }

    public function getMedias() {
        return $this->medias;
    }

    public function countMedia() {
        return count($this->medias);
    }

    public function countEngagement($field) {
        $mount = 0;
        $medias = $this->medias;
        foreach ($medias as $value)
            $mount += $value[$field]['count'];

        return $mount;
    }

}