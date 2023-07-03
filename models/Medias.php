<?php

class Medias
{
    private $id_medias;
    private $title;
    private $id_types;

    /**
	 * @return mixed
	 */
	public function getId_medias() {
		return $this->id_medias;
	}
	
	/**
	 * @param mixed $id_medias 
	 * @return self
	 */
	public function setId_medias($id_medias): self {
		$this->id_medias = $id_medias;
		return $this;
	}

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
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * @param mixed $title 
	 * @return self
	 */
	public function setTitle($title): self {
		$this->title = $title;
		return $this;
	}

    public function getAll()
    {
    }

    public function get()
    {
    }

    public function insert()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
