<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Sockets;

use PHPUnit_Framework_TestCase as TestCase;

class NetworkSocketTest extends TestCase {

    public function testConstructor() {
        $socket = new NetworkSocket('127.0.0.1', 80);
        $this->assertSame('127.0.0.1', $socket->getHost());
        $this->assertSame(80, $socket->getPort());
    }

    public function testConstructorAndSetters() {
        $socket = new NetworkSocket('127.0.0.1', 80);
        $socket->setHost('127.0.0.2');
        $socket->setPort(8080);

        $this->assertSame('127.0.0.2', $socket->getHost());
        $this->assertSame(8080, $socket->getPort());
    }

    public function testSetters() {
        $socket = new NetworkSocket();
        $socket->setHost('127.0.0.2');
        $socket->setPort(8080);

        $this->assertSame('127.0.0.2', $socket->getHost());
        $this->assertSame(8080, $socket->getPort());
    }

    public function testSettersWithHostname() {
        $socket = new NetworkSocket('127.0.0.3');
        $socket->setPort(8080);

        $this->assertSame('127.0.0.3', $socket->getHost());
        $this->assertSame(8080, $socket->getPort());
    }

}
