<?php

class Recipes{
    private $id_recipes;
    private $title;
    private $ingredient;
    private $decription;
    private $id_medias;

/**
	 * @return mixed
	 */
	public function getId_recipes() {
		return $this->id_recipes;
	}
	
	/**
	 * @param mixed $id_recipes 
	 * @return self
	 */
	public function setId_recipes($id_recipes): self {
		$this->id_recipes = $id_recipes;
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

        /**
	 * @return mixed
	 */
	public function getIngredient() {
		return $this->ingredient;
	}
	
	/**
	 * @param mixed $ingredient 
	 * @return self
	 */
	public function setIngredient($ingredient): self {
		$this->ingredient = $ingredient;
		return $this;
	}
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
	public function getDecription() {
		return $this->decription;
	}
	
	/**
	 * @param mixed $decription 
	 * @return self
	 */
	public function setDecription($decription): self {
		$this->decription = $decription;
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