<?php

namespace Niranjannsahoo\Odkcentralapi\Services;

use GuzzleHttp\Client;
use Niranjannsahoo\Odkcentralapi\Helpers\ResponseHelper;
use Niranjannsahoo\Odkcentralapi\Exceptions\OdkException;

class FormService
{
    public $api;

    public $projectId;

    public $xmlFormId;

    public $submissionId;

    public $endpoint;

    private $params;

    private $headers;

    private $file;
	
    public function __construct()
    {
		$this->api = new OdkCentralRequest;

        $this->projectId = null;

        $this->xmlFormId = null;

        $this->submissionId = null;

        $this->endpoint = '';

        $this->query = [];

        $this->headers = [];

        $this->file = null;
    }
	
	# GET /v1/projects/{projectId}/forms 
	# List all Forms

    public function all($parameters,$metadata=false,$query=[])
    {
        if($metadata){
			$this->headers = [
				'X-Extended-Metadata' => 'true',
			];
		}

        $this->projectId = $parameters['projectId'];

        $this->endpoint = 'projects/'.$this->projectId.'/forms/';
		if($query){
			$this->query = [
				'deleted' => $query['deleted']
				
			];
		}

        return $this->api->get($this->endpoint, $this->query, $this->headers);
    }
}
