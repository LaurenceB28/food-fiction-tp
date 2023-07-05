<?php
require_once __DIR__ . '/../helpers/connect.php';
class Recipes
{
	private $id_recipes;
	private $title;
	private $ingredient;
	private $description;
	private $id_medias;

	private object $pdo;


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

	/**
	 * @return mixed
	 */
	public function getIngredient()
	{
		return $this->ingredient;
	}

	/**
	 * @param mixed $ingredient 
	 * @return self
	 */
	public function setIngredient($ingredient): self
	{
		$this->ingredient = $ingredient;
		return $this;
	}
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
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description 
	 * @return self
	 */
	public function setDescription($description): self
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return object
	 */
	public function getPdo(): object
	{
		return $this->pdo;
	}

	/**
	 * @param object $pdo 
	 * @return self
	 */
	public function setPdo(object $pdo): self
	{
		$this->pdo = $pdo;
		return $this;
	}

	/**
	 * Summary of insert
	 * @return bool
	 */
	public function add(): bool
	{
		$pdo = Database::getInstance();
		$sql = 'INSERT INTO `recipes` (`title`, `ingredient`, `description`,`id_medias`) 
        VALUES (:title, :ingredient, :description,1);';
		$sth = $pdo->prepare($sql);
		//Affectation des valeurs aux marqueurs nominatifs
		$sth->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
		$sth->bindValue(':ingredient', $this->getIngredient(), PDO::PARAM_STR);
		$sth->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
		// On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
		return $sth->execute();
	}
	public static function recipes()
	{
		$pdo = Database::getInstance();
		$sth = $pdo->query('SELECT `id_recipes`,`title`FROM `recipes`;');
		return $sth->fetchAll(PDO::FETCH_OBJ);
	}

	public function isExist()
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT `title` FROM `recipes` WHERE `title`= :title;'; 
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':title', $this->title);
		$sth->execute();
		return $sth->fetch();
	}

	public static function getRecipes(?string $search = '', int $limit = null, int $offset = 0)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `recipes` WHERE `title` LIKE  :search';
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
        $sql = 'SELECT COUNT(`id_recipes`) as `nbRecipes` FROM `recipes`
                    WHERE `title` LIKE :search';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetchColumn();
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

// public static function search($search)
	// {
	// 	$pdo = Database::getInstance();
	// 	$sql = 'SELECT * FROM `recipes` WHERE `title` LIKE  :search OR  `ingredients` LIKE :search ;';
	// 	$sth = $pdo->prepare($sql);
	// 	$sth->bindValue(':search', '%' . $search . '%'); //'%'=(commence par).$search. '%' permet la recherche soit par la premiere lettre ou par les suivantes ex: 'Lau' ou 'au'//
	// 	$sth->execute();
	// 	return $sth->fetchAll(PDO::FETCH_OBJ);
	// }

	// public static function pagination($page)
	// {
	// 	$pdo = Database::getInstance();
	// 	$sql = 'SELECT * FROM `recipes` 
	// ORDER BY `id_recipes` 
	// LIMIT 10 OFFSET :paging ;'; /* $offset ou 0*/
	// 	$page = ($page - 1) * 10;
	// 	$sth = $pdo->prepare($sql);
	// 	$sth->bindValue(':paging', $page, PDO::PARAM_INT);
	// 	$sth->execute();
	// 	return $sth->fetchAll();
	// }

	// public static function count()
	// {
	// 	$pdo = Database::getInstance();
	// 	$sql = 'SELECT COUNT(*) AS `idCount` FROM `recipes`;';
	// 	$sth = $pdo->query($sql);
	// 	return $sth->fetch(PDO::FETCH_OBJ);
	// }