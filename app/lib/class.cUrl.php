<?php


Class cUrl { 

	private $curl;
	private $url; 
	private $typeOfRequest;
	private $params;
	private $jsonResults;

	public $arrayResults;

	public function __construct($url, $typeOfRequest, $urlParams) { 

		$this->curl          = curl_init();
		$this->url           = $url; 
		$this->urlParams     = $urlParams;
		$this->typeOfRequest = $typeOfRequest;

	}

	public function setOptions() { 

		switch($this->typeOfRequest) { 
		
			case "get": 
				$paramsString = $this->createParamsString();
				$curlString   = "{$this->url}?{$paramsString}";
				$curlString   = str_replace (' ', '%20', $curlString); 

				curl_setopt_array($this->curl, array(
    				CURLOPT_RETURNTRANSFER => 1,
    				CURLOPT_URL => $curlString 
				));

			break;

		}

	}

	public function runCUrl() { 

		$this->jsonResults = curl_exec($this->curl);
		if($this->jsonResults == false) {
    		die('Error: "' . curl_error($this->curl) . '" - Code: ' . curl_errno($this->curl));
		}

		curl_close($this->curl);
	}

	public function jsonDecode() { 
		$this->arrayResults = json_decode($this->jsonResults);
	}

	public function createParamsString() { 
		$paramsStringArray = array();

		foreach($this->urlParams as $key => $value) { 
			$paramsStringArray[] = "{$key}={$value}";
		}

		return implode("&", $paramsStringArray);
	}
}

?>