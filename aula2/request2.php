<?php


class Request {
private $method;
private $protocol;
private $ip;
private $resource;
private $parameters;

public function __construct($method, $protocol, $ip, $resource, $parameters){
$this->method = $method;
$this->protocol = $protocol;
$this->ip = $ip;
$this->resource = $resource;
$this->parameters = $parameters;


}


public function toString(){
$request = $this->protocol. "://". $this->ip. "/" . $this->resource."?" . $this->parameters . "=" . $values. "&";


return utf8_encode($request);
}


public function getMethod(){
            return $this->method;
        }
  public function setMethod($method){
            $this->method = $method;
            
        }

        public function getProtocol(){
            return $this->protocol;
        }
      
        public function setProtocol($protocol){
            $this->protocol = $protocol;
            
        }


        public function getIp(){
            return $this->ip;
        }
      
        public function setIp($ip){
            $this->ip = $ip;
            
        }

        public function getResource(){
            return $this->resource;
        }
      
        public function setResource($resource){
            $this->resource = $resource;
            
        }

        public function getParameters(){
            return $this->parameters;
        }
      
        public function setParameters($parameters){
            $this->parameters = $parameters;
            
        }


} 


$request = new Request("http","127.0.0.1","resource/subresource",array("param1"=>122),"POST");
echo $request->toString();

?>
