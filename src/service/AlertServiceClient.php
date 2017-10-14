<?php

/**
 * Copyright 2008-2017 OPPO Mobile Comm Corp., Ltd, All rights reserved.
 * @Author: seven
 * @Date:   2017-10-13 18:30:45
 * @Last Modified by:   seven
 * @Last Modified time: 2017-10-13 18:44:30
 */

namespace oppo\service\alert;

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TFramedTransport;
use Thrift\Transport\TSocketPool;
use Thrift\Exception\TException;

class AlertServiceClient {
  private $client;
  private $transport;

  public function __construct($arrHost, $arrPort){
    $transport = new TFramedTransport(new TSocketPool($arrHost, $arrPort));
    $protocol = new TBinaryProtocol($transport);
    $this->client = new AlertUtilitiesServiceClient($protocol);
    $this->transport->open();
  }

  public function SendMail(){
    var_dump($this->client->PrintVersion());
  }

  public function __destruct(){
    $this->transport->close();
  }
}
