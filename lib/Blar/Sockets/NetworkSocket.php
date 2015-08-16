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
    public function __construct($host = NULL, $port = NULL) {
        $this->setHost($host);
        $this->setPort($port);
    }

    /**
     * @return string
     */
    public function __toString() {
        return sprintf('%s:%u', $this->getHost(), $this->getPort());
    }

    /**
     * @return string
     */
    public function getHost() {
        return $this->host;
    }

    /**
     * @param string $host
     * @return $this
     */
    public function setHost($host) {
        $this->host = $host;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * @param int $port
     * @return $this
     */
    public function setPort($port) {
        $this->port = $port;
        return $this;
    }

}
