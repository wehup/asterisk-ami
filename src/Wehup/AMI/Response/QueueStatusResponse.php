<?php

namespace Wehup\AMI\Response;

class QueueStatusResponse implements ResponseInterface
{

    protected $queues = array();

    private function getQueueValues($attributes)
    {
        $data = explode("\r\n",$attributes);        
        array_shift($data);

        $queue = "";
        $values = array();

        foreach($data as $attribute) {
            $row = explode(':',trim($attribute),2);

            $key = strtolower(trim($row[0]));
            $value = trim($row[1]);

            $key == "queue" ?  $queue = $value : $values[$key] = $value;            
        }

        return array('queue' => $queue, 'values' => $values);
    }

    public function getQueues()
    {
        return $this->queues;
    }

    public function addQueue($attributes)
    {        
        $data = $this->getQueueValues($attributes);

        $this->queues[$data['queue']] = array('params' => $data['values'],'members' => array(),'calls' => array());            
    }

    public function addMember($attributes)
    {
        $data = $this->getQueueValues($attributes);

        array_push($this->queues[$data['queue']]['members'],$data['values']);        
    }

    public function addCaller($attributes)
    {        
        $data = $this->getQueueValues($attributes);

        array_push($this->queues[$data['queue']]['calls'],$data['values']);
    }

}
