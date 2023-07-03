<?php

class Genres
{
    private $id_genres;
    private $genre;

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre 
     * @return self
     */
    public function setGenre($genre): self
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId_genres()
    {
        return $this->id_genres;
    }

    /**
     * @param mixed $id_genres 
     * @return self
     */
    public function setId_genres($id_genres): self
    {
        $this->id_genres = $id_genres;
        return $this;
    }

    public function getAll(){
        
    }

    public function get(){
        
    }

}
