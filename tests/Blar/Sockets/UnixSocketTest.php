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
    }

    public function testString() {
        $socket = new UnixSocket('/var/run/test.sock');
        $this->assertSame('/var/run/test.sock', (string) $socket);
    }

    public function testSetter() {
        $socket = new UnixSocket('/var/run/test.sock');
        $socket->setFileName('/var/run/test2.sock');
        $this->assertSame('/var/run/test2.sock', (string) $socket);
    }

}
