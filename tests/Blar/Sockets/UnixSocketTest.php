<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Sockets;

use PHPUnit_Framework_TestCase as TestCase;

class UnixSocketTest extends TestCase {

    public function testConstructor() {
        $socket = new UnixSocket('/var/run/test.sock');
        $this->assertSame('/var/run/test.sock', $socket->getFileName());
        $this->assertEquals('/var/run/test.sock', $socket);
    }

    public function testString() {
        $socket = new UnixSocket('/var/run/test.sock');
        $this->assertSame('/var/run/test.sock', (string) $socket);
    }

    public function testSetter() {
        $socket = new UnixSocket();
        $socket->setFileName('/var/run/test2.sock');
        $this->assertSame('/var/run/test2.sock', (string) $socket);
    }

    public function testEquals() {
        $socket1 = new UnixSocket();
        $socket1->setFileName('/var/run/test.sock');

        $socket2 = new UnixSocket();
        $socket2->setFileName('/var/run/test.sock');

        $this->assertTrue($socket1->equals($socket2));
        $this->assertTrue($socket2->equals($socket1));
    }

    public function testNotEquals() {
        $socket1 = new UnixSocket('/var/run/test.sock');

        $socket2 = new NetworkSocket('127.0.0.1');
        $socket2->setPort(8080);

        $this->assertFalse($socket1->equals($socket2));
        $this->assertFalse($socket2->equals($socket1));
    }

}
