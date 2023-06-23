<?php

class Medias_genres
{
    private $id_genres;
    private $id_medias;

    /**
     * @return mixed
     */
    public function getId_medias()
    {
        return $this->id_medias;
    }

    /**
     * @param mixed $id_medias 
     * @return self
     */
    public function setId_medias($id_medias): self
    {
        $this->id_medias = $id_medias;
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
