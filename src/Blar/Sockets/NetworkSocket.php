<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Sockets;

use Blar\Comparable\Comparable;

/**
 * Class NetworkSocket
 *
 * @package Blar\Sockets
 */
class NetworkSocket implements Socket, Comparable {

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port = 0;

    /**
     * NetworkSocket constructor.
     *
     * @param string $host
     * @param int $port
     */
    public function __construct(string $host, int $port = 0) {
        $this->setHost($host);
        $this->setPort($port);
    }

    /**
     * @return string
     */
    public function __toString(): string {
        return sprintf('%s:%u', $this->getHost(), $this->getPort());
    }

    /**
     * @return string
     */
    public function getHost(): string {
        return $this->host;
    }

    /**
     * @param string $host
     */
    protected function setHost(string $host): void {
        $this->host = $host;
    }

    /**
     * @return int
     */
    public function getPort(): int {
        return $this->port;
    }

    /**
     * @param int $port
     */
    protected function setPort(int $port): void {
        $this->port = $port;
    }

    /**
     * @param mixed $other
     *
     * @return bool
     */
    public function compareTo($other): bool {
        if(!($other instanceof $this)) {
            return FALSE;
        }
        if($this->getHost() !== $other->getHost()) {
            return FALSE;
        }
        if($this->getPort() !== $other->getPort()) {
            return FALSE;
        }
        return TRUE;
    }

}
