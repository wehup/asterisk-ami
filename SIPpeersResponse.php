<?php

namespace Wehup\AMI\Response;

class SIPpeersResponse implements ResponseInterface
{

    protected $peers = array();

    public function getPeers()
    {
        return $this->peers;
    }

    public function addPeer($attributes)
    {
        $peer = array();

        foreach ($attributes as $attribute) {            
            $match = explode(':', $attribute, 2);

            if (!preg_match('/Channeltype/',$match[0])) {
                $peer[trim($match[0])] = trim($match[1]);
            }            
        }

        if (count($peer) > 0) {
            array_push($this->peers, $peer);
        }        
    }

}
