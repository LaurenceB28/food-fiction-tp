<?php

class Users
{
    private $id_users;
    private $lastname;
    private $firstname;
    private $email;
    private $password;
    private $pseudo;
    private $picture;
    private $created_at;
    private $validated_at;
    private $updated_at;
    private $deleted_at;
    private $role;

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
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname 
     * @return self
     */
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname 
     * @return self
     */
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email 
     * @return self
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password 
     * @return self
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo 
     * @return self
     */
    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture 
     * @return self
     */
    public function setPicture($picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at 
     * @return self
     */
    public function setCreated_at($created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValidated_at()
    {
        return $this->validated_at;
    }

    /**
     * @param mixed $validated_at 
     * @return self
     */
    public function setValidated_at($validated_at): self
    {
        $this->validated_at = $validated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at 
     * @return self
     */
    public function setUpdated_at($updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleted_at()
    {
        return $this->deleted_at;
    }

    /**
     * @param mixed $deleted_at 
     * @return self
     */
    public function setDeleted_at($deleted_at): self
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role 
     * @return self
     */
    public function setRole($role): self
    {
        $this->role = $role;
        return $this;
    }
}
