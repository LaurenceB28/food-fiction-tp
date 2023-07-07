<?php
require_once __DIR__ . '/../helpers/connect.php';
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

	public function insert()
	{
		$pdo = Database::getInstance();
		$sql = 'INSERT INTO `medias` (`title`,`id_types`) 
        VALUES (:title, :id_types);';
		$sth = $pdo->prepare($sql);
		//Affectation des valeurs aux marqueurs nominatifs
		$sth->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
		$sth->bindValue(':id_types', $this->getId_types(), PDO::PARAM_INT);
		// On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
		return $sth->execute();
	}

	public function isExist()
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT `title` FROM `medias` WHERE `title`= :title;'; 
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':title', $this->title);
		$sth->execute();
		return $sth->fetch();
	}

    public static function getAllMedias(?string $search = '', int $limit = null, int $offset = 0)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `medias` WHERE `title` LIKE  :search';
        if (!is_null($limit)) {
            $sql .= ' LIMIT :limit OFFSET :offset';
        }
        $sql .= ';';
        // On prépare la requête
        $sth = $pdo->prepare($sql);
        // On associe le marqueur nominatif à la valeur de search
        $sth->bindValue(':search', "%$search%", PDO::PARAM_STR);
        // On associe les marqueurs nominatifs aux valeurs de offset et limit
        if (!is_null($limit)) {
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        }
        $sth->execute();
        return $sth->fetchAll();
    }

    public static function count(string $search): int
    {
        $sql = 'SELECT COUNT(`id_medias`) as `nbrMedias` FROM `medias`
                    WHERE `title` LIKE :search';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetchColumn();
    }

    public function get()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
