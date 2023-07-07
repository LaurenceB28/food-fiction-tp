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
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `medias_genres` (`id_genres`,`id_medias`) VALUES (:id_genres, :id_medias);';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_genres', $this->id_genres);
        $sth->bindValue(':id_medias', $this->id_medias);
        if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
