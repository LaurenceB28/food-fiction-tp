<?php
require_once __DIR__ . '/../helpers/connect.php';
class Medias
{
	private $id_medias;
	private $title;
	private $id_types;
	private $picture;



	/**
	 * @return mixed
	 */
	public function getId_medias()
	{
		return $this->id_medias;
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
	public function getId_types()
	{
		return $this->id_types;
	}

	/**
	 * @param mixed $id_types 
	 * @return self
	 */
	public function setId_types($id_types): self
	{
		$this->id_types = $id_types;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title 
	 * @return self
	 */
	public function setTitle($title): self
	{
		$this->title = $title;
		return $this;
	}

	public function insert()
	{
		$pdo = Database::getInstance();
		$sql = 'INSERT INTO `medias` (`title`,`id_types`,`picture`) 
        VALUES (:title, :id_types, :picture);';
		$sth = $pdo->prepare($sql);
		//Affectation des valeurs aux marqueurs nominatifs
		$sth->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
		$sth->bindValue(':id_types', $this->getId_types(), PDO::PARAM_INT);
		$sth->bindValue(':picture', $this->getPicture());
		// On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
		return $sth->execute();
	}
	/**
	 * Summary of isExist
	 * @return mixed
	 */	public function isExist()
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT `title` FROM `medias` WHERE `title`= :title;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':title', $this->title);
		$sth->execute();
		return $sth->fetch();
	}
	/**
	 * Summary of getAllMedias
	 * @param mixed $search
	 * @param int $limit
	 * @param int $offset
	 * @return array
	 */
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
	/**
	 * Summary of getAll
	 * @param mixed $type
	 * @return array
	 */

	
	public static function getAll($type)
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT * FROM `medias` 
	INNER JOIN `types` 
	ON `medias`.id_types = `types`.id_types 
	WHERE `types`.id_types = :type;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':type', $type, PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetchAll();
	}


	
	/**
	 * Summary of updateMedias
	 * @return bool
	 */
	public function update()
	{
		$pdo = Database::getInstance();
		$sql = 'UPDATE `medias` SET
    `title`= :title,
	`picture`= :picture,
	`id_medias` = :id_medias ,  
	`id_types` = :id_types ,  
    WHERE `id_recipes`= :id_recipes;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':title', $this->title);
		$sth->bindValue(':id_medias', $this->id_medias);
		return $sth->execute();
	}
	/**
	 * Summary of modify
	 * @return mixed
	 */
	public function modify(): mixed
	{
		$pdo = Database::getInstance();
		$sql = 'UPDATE `medias` 
  	SET `medias`.`title` = :title,
  	`medias`.`picture` = :picture,
  `medias`.`id_types` = :id_types,
  WHERE `medias`.`id_medias` = :id_medias;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':id_types', $this->id_types, PDO::PARAM_INT);
		$sth->bindValue(':title', $this->title, PDO::PARAM_STR_CHAR);
		$sth->bindValue(':picture', $this->title);
		return $sth->execute();
	}




	/**
	 * Summary of deleteMedias
	 * @param mixed $id_medias
	 * @return bool
	 */
	public static function deleteMedias($id_medias)
	{
		$pdo = Database::getInstance();
		$sql = 'DELETE FROM `medias` WHERE `id_medias` = :id_medias ;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':id_medias', $id_medias, PDO::PARAM_INT);
		return $sth->execute();
	}










	// public static function displayRecipes($id_medias)
	// {
	// 	$pdo = Database::getInstance();
	// 	$sql = 'SELECT `medias`.`id_medias` AS `idMedias`,
	// `medias`.`idRecipes` 
	// FROM `medias` 
	// WHERE  `idRecipes` = :idRecipes;';
	// 	$sth = $pdo->prepare($sql);
	// 	$sth->bindValue(':idRecipes', $id_medias, PDO::PARAM_INT);
	// 	return $sth->execute();
	// }




}
