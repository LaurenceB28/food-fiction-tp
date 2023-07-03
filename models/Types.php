<?php

class Types
{
    private $id_types;
    private $type;


	/**
	 * @return mixed
	 */
	public function getId_types() {
		return $this->id_types;
	}
	
	/**
	 * @param mixed $id_types 
	 * @return self
	 */
	public function setId_types($id_types): self {
		$this->id_types = $id_types;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}
	
	/**
	 * @param mixed $type 
	 * @return self
	 */
	public function setType($type): self {
		$this->type = $type;
		return $this;
	}

    public function getAll(){
        
    }

    public function get(){
        
    }
}
