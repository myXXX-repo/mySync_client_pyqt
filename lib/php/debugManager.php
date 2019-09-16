<?php

class debugManager{
    private $configFilePath='config/debug,ini';
    private $debugStatue;
    public function __construct(){
        if(file_exists($this->configFilePath)){
            $this->debugStatue=file_get_contents($this->configFilePath);
        }else{
            file_put_contents($this->configFilePath,'0');
            $this->debugStatue=0;
        }
	}
	public function __destruct(){
		$this->putStatusToFile();
	}
    public function switchOn(){
        $this->debugStatue=1;
        $this->putStatusToFile();
    }
    public function switchOff(){
        $this->debugStatue=0;
        $this->putStatusToFile();
	}
	public function switch(){
		if($this->debugStatue==1){
			$this->debugStatue=0;
		}else{
			$this->debugStatue=1;
		}
		$this->putStatusToFile();
	}
    protected function putStatusToFile(){
        file_put_contents($this->configFilePath,$this->debugStatue);
    }
}