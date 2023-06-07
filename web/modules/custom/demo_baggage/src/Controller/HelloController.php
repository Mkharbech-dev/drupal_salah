<?php

namespace Drupal\demo_baggage\Controller;

class HelloController {
  public function bonjour()
  {
    $service = \Drupal::service("demo_baggage.hello.world");
    $service->disBonjour();
    //$service->disBonjour('salah');
    print '<pre>';
    print_r($service);
    exit('aurevoir');
  }
}
