<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Sockets;

use PHPUnit\Framework\TestCase;

/**
 * Class UnixSocketTest
 *
 * @package Blar\Sockets
 */
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
        $socket = new UnixSocket('/var/run/test2.sock');
        $this->assertSame('/var/run/test2.sock', (string) $socket);
    }

    public function testEquals() {
        $socket1 = new UnixSocket('/var/run/test.sock');
        $socket2 = new UnixSocket('/var/run/test.sock');

        $this->assertTrue($socket1->compareTo($socket2));
        $this->assertTrue($socket2->compareTo($socket1));
    }

    public function testNotEquals() {
        $socket1 = new UnixSocket('/var/run/test.sock');
        $socket2 = new NetworkSocket('127.0.0.1', 8080);

        $this->assertFalse($socket1->compareTo($socket2));
        $this->assertFalse($socket2->compareTo($socket1));
    }

    public function testNotEquals2() {
        $socket1 = new UnixSocket('/var/run/test1.sock');
        $socket2 = new UnixSocket('/var/run/test2.sock');

        $this->assertFalse($socket1->compareTo($socket2));
        $this->assertFalse($socket2->compareTo($socket1));
    }

    public function testToString() {
        $socket = new UnixSocket('/var/run/test.sock');
        $this->assertSame('/var/run/test.sock', (string) $socket);
    }

}
