<?php

namespace application\lib;

class JsonDb 
{
    protected $filename;

    public function __construct($filename){
        if(!file_exists($filename)){
            file_put_contents($filename, '[]');
        }
        $this->filename = $filename;
    }

    public function getAll(){
        $json = file_get_contents($this->filename);
        return json_decode($json, true);
    }
    public function getId($id){
        $data = $this->getAll();       
        return isset($data[$id]) ? $data[$id] : null;
    }

    public function insert($item){
        $data = $this->getAll();       
        $data[] = $item;
        $json = json_encode($data);
        file_put_contents($this->filename, $json);
    }

    public function update($id,$item) {
        $data = $this->getAll();
        $data[$id] = $item;
        $json = json_encode($data);
        file_put_contents($this->filename,$json); 
    }

    public function delete($id){
        $data = $this->getAll();
        unset($data[$id]);
        $json = json_encode($data);
        file_put_contents($this->filename, $json);

    }



}



  