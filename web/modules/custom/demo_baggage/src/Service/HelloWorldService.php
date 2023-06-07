<?php

namespace Drupal\demo_baggage\Service;

class HelloWorldService {
  protected $hello;

  public function __construct()
  {
    $this->hello = 'salut tout le monde';
  }

  public function disBonjour($nom = '')
  {
    if(empty($nom)){
      return $this->hello;
    }else{
      return "Bonjour". $nom. "!";
    }
  }
}
