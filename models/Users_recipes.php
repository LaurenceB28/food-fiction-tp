<?php

class Users_recipes
{
    private $id_users;
    private $id_recipes;

    /**
     * @return mixed
     */
    public function getId_users()
    {
        return $this->id_users;
    }

    /**
     * @param mixed $id_users 
     * @return self
     */
    public function setId_users($id_users): self
    {
        $this->id_users = $id_users;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId_recipes()
    {
        return $this->id_recipes;
    }

    /**
     * @param mixed $id_recipes 
     * @return self
     */
    public function setId_recipes($id_recipes): self
    {
        $this->id_recipes = $id_recipes;
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
