<?php

namespace Wehup\AMI\Request;

/**
 * @returns SIPshowpeerResponse
 * @returns PermissionDeniedResponse
 * @returns PeerNotFoundResponse
 */
class SIPshowpeerRequest implements RequestInterface
{
    protected $peer;
    
    public function __construct($peer)
    {
        $this->peer = $peer;
    }

    public function getAction()
    {
        return 'SIPshowpeer';
    }

    public function getParams()
    {
        return array(
            'Peer' => $this->peer
        );
    }

}
