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
        $this->assertSame('127.0.0.1:80', (string) $socket);
    }

    public function testConstructorAndSetters() {
        $socket = new NetworkSocket('127.0.0.1', 80);
        $socket->setHost('127.0.0.2');
        $socket->setPort(8080);

        $this->assertSame('127.0.0.2', $socket->getHost());
        $this->assertSame(8080, $socket->getPort());
        $this->assertSame('127.0.0.2:8080', (string) $socket);
    }

    public function testSetters() {
        $socket = new NetworkSocket();
        $socket->setHost('127.0.0.2');
        $socket->setPort(8080);

        $this->assertSame('127.0.0.2', $socket->getHost());
        $this->assertSame(8080, $socket->getPort());
        $this->assertSame('127.0.0.2:8080', (string) $socket);
    }

    public function testSettersWithHostname() {
        $socket = new NetworkSocket('127.0.0.3');
        $socket->setPort(8080);

        $this->assertSame('127.0.0.3', $socket->getHost());
        $this->assertSame(8080, $socket->getPort());
        $this->assertSame('127.0.0.3:8080', (string) $socket);
    }

    public function testEquals() {
        $socket1 = new NetworkSocket('127.0.0.1');
        $socket1->setPort(8080);

        $socket2 = new NetworkSocket('127.0.0.1');
        $socket2->setPort(8080);

        $this->assertTrue($socket1->compareTo($socket2));
        $this->assertTrue($socket2->compareTo($socket1));
    }

    public function testNotEquals() {
        $socket1 = new NetworkSocket('127.0.0.1');
        $socket1->setPort(8080);

        $socket2 = new NetworkSocket('127.0.0.2');
        $socket2->setPort(8080);

        $this->assertFalse($socket1->compareTo($socket2));
        $this->assertFalse($socket2->compareTo($socket1));
    }

    public function testNotEqualsPort() {
        $socket1 = new NetworkSocket('127.0.0.1');
        $socket1->setPort(8080);

        $socket2 = new NetworkSocket('127.0.0.1');
        $socket2->setPort(8081);

        $this->assertFalse($socket1->compareTo($socket2));
        $this->assertFalse($socket2->compareTo($socket1));
    }

    public function testNotEqualsSocket() {
        $socket1 = new NetworkSocket('127.0.0.1');
        $socket1->setPort(8080);

        $socket2 = new UnixSocket('/var/run/test.sock');

        $this->assertFalse($socket1->compareTo($socket2));
        $this->assertFalse($socket2->compareTo($socket1));
    }

    public function testToString() {
        $socket = new NetworkSocket('127.0.0.1', 8080);

        $this->assertSame('127.0.0.1:8080', (string) $socket);
    }

}
