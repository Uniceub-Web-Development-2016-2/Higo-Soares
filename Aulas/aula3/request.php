<?php
    class Request{
       
        public $Method;
        public $Protocol;
        public $IP;
	public $Request_ip;
        public $Resource;
        public $Parameters;
       
        public function __construct($method, $protocol, $ip, $request_ip, $resource, $parameters){
            $this->Method = $method;
            $this->Protocol = $protocol;
            $this->IP = $ip;
	    $this->Request_ip = $request_ip;
            $this->Resource = $resource;
            $this->Parameters = $parameters;
        }
 
        public function getProtocol(){
            return $this->Protocol;
        }
 
        public function getMethod(){
            return $this->Method;
        }
 
        public function getIP(){
            return $this->IP;
        }

	public function getRequest_ip(){
		return $this->Request_ip;
}
 
        public function getResource(){
            return $this->Resource;
        }
 
        public function getParameters(){
            return $this->Parameters;
        }
 
        public function setProtocol($protocol){
            $this->Protocol = $protocol;
        }
 
        public function setMethod($method){
            $this->Method = $method;
        }
 
        public function setIP($ip){
            $this->IP = $ip;
        }

	public function setRequest_ip($request_ip){
		$this->Request_ip = $request_ip;	
}
 
        public function setResource($resource){
            $this->Resource = $resource;
        }
 
        public function setParameters($parameters){
            $this->Parameters = $parameters;
        }
 
        public function toString(){
            $url = $this->getProtocol()."://".$this->getIP()."/".$this->getResource()."?";
            $parameter = "";
            foreach($this->Parameters as $key => $value){
                $parameter = $parameter.$key."=".$value."&";
 
            }
            $url = $url.$parameter;
            return $url;
        }  
    }
 
    //$request = new Request("method", "https", "172.22.51.21", "172.22.51.128", "resource", array//("par1"=>123,"par2"=>1234));
 
    //echo $request->toString();
