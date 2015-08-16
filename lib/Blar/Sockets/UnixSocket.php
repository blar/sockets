<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Sockets;

/**
 * Class UnixSocket
 *
 * @package Blar\Sockets
 */
class UnixSocket implements Socket {

    /**
     * @var string
     */
    private $fileName;

    /**
     * UnixSocket constructor.
     *
     * @param string $fileName
     */
    public function __construct($fileName) {
        $this->setFileName($fileName);
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->getFileName();
    }

    /**
     * @return string
     */
    public function getFileName() {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }

}
