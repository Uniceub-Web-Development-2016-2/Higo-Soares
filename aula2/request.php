<?php


public function __construct(){

}

class Resource {
     Resource(URI u);
     Response get();
     Response post(Request r);
     Response put(Request r);
     Response delete();
} 

?>
