<?php

class Genres
{
    private $id_genres;
    private $genres;

    /**
     * @return mixed
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param mixed $genre 
     * @return self
     */
    public function setGenres($genres): self
    {
        $this->genres = $genres;
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

    public static function getAll()
    {
$pdo = Database::getInstance();

$sql= 'SELECT * FROM `genres`;';
$sth = Database::getInstance()->query($sql);
return $sth->fetchAll();



        
}

    public function get(){
        
    }

}
