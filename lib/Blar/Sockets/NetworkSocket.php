<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Sockets;

/**
 * Class NetworkSocket
 *
 * @package Blar\Sockets
 */
class NetworkSocket implements Socket {

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * NetworkSocket constructor.
     *
     * @param string $host
     * @param int $port
     */
    public function __construct(string $host = NULL, int $port = NULL) {
        if(!is_null($host)) {
            $this->setHost($host);
        }
        if(!is_null($port)) {
            $this->setPort($port);
        }
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
    public function setHost(string $host) {
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
    public function setPort(int $port) {
        $this->port = $port;
    }

    /**
     * @param Socket $socket
     *
     * @return bool
     */
    public function equals(Socket $socket): bool {
        if(!($socket instanceof $this)) {
            return FALSE;
        }
        if($this->getHost() != $socket->getHost()) {
            return FALSE;
        }
        if($this->getPort() != $socket->getPort()) {
            return FALSE;
        }
        return TRUE;
    }

}
