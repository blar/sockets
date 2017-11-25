<?php

/**
 * @author Andreas Treichel <gmblar+github@gmail.com>
 */

namespace Blar\Sockets;

use Blar\Comparable\Comparable;

/**
 * Class UnixSocket
 *
 * @package Blar\Sockets
 */
class UnixSocket implements Socket, Comparable {

    /**
     * @var string
     */
    private $fileName;

    /**
     * UnixSocket constructor.
     *
     * @param string $fileName
     */
    public function __construct(string $fileName) {
        $this->setFileName($fileName);
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
    protected function setFileName(string $fileName): void {
        $this->fileName = $fileName;
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
        if($this->getFileName() !== $other->getFileName()) {
            return FALSE;
        }
        return TRUE;
    }

}
