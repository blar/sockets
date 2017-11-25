<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Sockets;

use PHPUnit\Framework\TestCase;

class NetworkSocketTest extends TestCase {

    public function testConstructor() {
        $socket = new NetworkSocket('127.0.0.1', 80);
        $this->assertSame('127.0.0.1', $socket->getHost());
        $this->assertSame(80, $socket->getPort());
        $this->assertSame('127.0.0.1:80', (string) $socket);
    }

    public function testEquals() {
        $socket1 = new NetworkSocket('127.0.0.1', 8080);
        $socket2 = new NetworkSocket('127.0.0.1', 8080);

        $this->assertTrue($socket1->compareTo($socket2));
        $this->assertTrue($socket2->compareTo($socket1));
    }

    public function testNotEqualsHost() {
        $socket1 = new NetworkSocket('127.0.0.1', 8080);
        $socket2 = new NetworkSocket('127.0.0.2', 8080);

        $this->assertFalse($socket1->compareTo($socket2));
        $this->assertFalse($socket2->compareTo($socket1));
    }

    public function testNotEqualsPort() {
        $socket1 = new NetworkSocket('127.0.0.1', 8080);
        $socket2 = new NetworkSocket('127.0.0.1', 8081);

        $this->assertFalse($socket1->compareTo($socket2));
        $this->assertFalse($socket2->compareTo($socket1));
    }

    public function testNotEqualsSocket() {
        $socket1 = new NetworkSocket('127.0.0.1', 8080);
        $socket2 = new UnixSocket('/var/run/test.sock');

        $this->assertFalse($socket1->compareTo($socket2));
        $this->assertFalse($socket2->compareTo($socket1));
    }

    public function testToString() {
        $socket = new NetworkSocket('127.0.0.1', 8080);

        $this->assertSame('127.0.0.1:8080', (string) $socket);
    }

}
