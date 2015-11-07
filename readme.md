[![Build Status](https://travis-ci.org/blar/sockets.svg?branch=master)](https://travis-ci.org/blar/sockets)
[![Coverage Status](https://coveralls.io/repos/blar/sockets/badge.svg?branch=master)](https://coveralls.io/r/blar/sockets?branch=master)
[![Dependency Status](https://gemnasium.com/blar/sockets.svg)](https://gemnasium.com/blar/sockets)

# Sockets

## Beispiele

### Netzwerk-Socket

    $socket = new NetworkSocket('127.0.0.1', 80);

### Unix-Domain-Socket

    $socket = new UnixSocket('/var/run/test.sock');

## Installation

### Installation per Composer

    $ composer require blar/sockets

### Installation per Git

    $ git clone https://github.com/blar/sockets.git