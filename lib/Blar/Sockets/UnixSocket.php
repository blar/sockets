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
    public function __construct(string $fileName = NULL) {
        if(!is_null($fileName)) {
            $this->setFileName($fileName);
        }
    }

    /**
     * @return string
     */
    public function __toString(): string {
        return $this->getFileName();
    }

    /**
     * @return string
     */
    public function getFileName(): string {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName) {
        $this->fileName = $fileName;
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
        if($this->getFileName() != $socket->getFileName()) {
            return FALSE;
        }
        return TRUE;
    }

}
