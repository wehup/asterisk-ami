<?php

namespace Wehup\AMI\Response;

class SIPshowpeerResponse implements ResponseInterface
{

    protected $peer = array();

    public function getPeer()
    {
        return $this->peer;
    }

    public function setPeer($attributes)
    {                
        foreach ($attributes as $attribute) {            
            $match = explode(':', $attribute, 2);

            if (!preg_match('/Channeltype/',$match[0])) {                                
                $this->peer[trim($match[0])] = trim($match[1]);              
            }        
        }                            
    }

}
