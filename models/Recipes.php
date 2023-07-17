<?php
require_once __DIR__ . '/../helpers/connect.php';
class Recipes
{
	private $id_recipes;
	private $title;
	private $ingredient;
	private $description;
	private $id_medias;
	private $picture;
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
		$this->picture = $description;
		return $this;
	}

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
		$sql = 'INSERT INTO `recipes` (`title`, `ingredient`, `description`,`id_medias`, `picture`) 
        VALUES (:title, :ingredient, :description, :id_medias, :picture);';
		$sth = $pdo->prepare($sql);
		//Affectation des valeurs aux marqueurs nominatifs
		$sth->bindValue(':title', $this->getTitle(), PDO::PARAM_STR_CHAR);
		$sth->bindValue(':ingredient', $this->getIngredient(), PDO::PARAM_STR_CHAR);
		$sth->bindValue(':description', $this->getDescription(), PDO::PARAM_STR_CHAR);
		$sth->bindValue(':picture', $this->getPicture(), PDO::PARAM_STR_CHAR);
		$sth->bindValue(':id_medias', $this->getId_medias(), PDO::PARAM_INT);
		// On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
		return $sth->execute();
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
		$sth->bindValue(':search', '%'. $search .'%', PDO::PARAM_STR);
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
		$sql = 'SELECT COUNT(`id_recipes`) as `nbrRecipes` 
		FROM `recipes`
        WHERE `title` LIKE :search';
		$sth = Database::getInstance()->prepare($sql);
		$sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
		$sth->execute();
		return $sth->fetchColumn();
	}


	public static function getAllbyMedias($id_medias)
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT `recipes`.`title` AS `recipeName`, `recipes`.`picture`AS `recipePicture`,  `recipes`.`id_recipes` FROM `recipes` 
		INNER JOIN `medias` ON `recipes`.id_medias = `medias`.id_medias 
		WHERE `recipes`.id_medias = :id_medias;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':id_medias', $id_medias, PDO::PARAM_STR_CHAR);
		$sth->execute();
		return $sth->fetchAll();
	}

	 /**
     * 
     * Méthode permettant de récupérer toutes les données de la recette
     * @param int $id
     * 
     * @return mixed
     * Retourne un objet issu de la class Recipes ou false
     */
    public static function get(int $id_recipes): object|bool
    {
        // On stocke une instance de la classe PDO dans une variable
        $pdo = Database::getInstance();

        // On créé la requête
        $sql = 'SELECT * FROM `recipes` WHERE `id_recipes` = :id_recipes';

        // On prépare la requête
        $sth = $pdo->prepare($sql);

        // On affecte chaque valeur à chaque marqueur nominatif
        $sth->bindValue(':id_recipes', $id_recipes, PDO::PARAM_INT);

        if ($sth->execute()) {
            return $sth->fetch();  
        }
    }




	public static function getAllbyGenre($id_genres)
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT `recipes`.`id_recipes`,`recipes`.`picture`, `recipes`.`title` AS `recipeName` FROM `recipes` 
		INNER JOIN `medias` ON `medias`.id_medias = `recipes`.id_medias
    	INNER JOIN `medias_genres` ON `medias_genres`.id_medias = `medias`.id_medias
		WHERE `medias_genres`.id_genres = :id_genres';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':id_genres', $id_genres, PDO::PARAM_STR_CHAR);
		$sth->execute();
		return $sth->fetchAll();
	}


	public static function recipesLike($id_users)
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT `recipes`.`id_recipes` FROM `recipes`
		INNER JOIN `user_recipes` ON `user_recipes`.`id_recipes` = `recipes`.id_recipes
		WHERE `user.recipes`.id_users = :id_users ;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':id_users', $id_users, PDO::PARAM_STR_CHAR);
		$sth->execute();
		return $sth->fetchAll();
	}


	

	// public static function displayRecipes($id_medias)
	// {
	// 	$pdo = Database::getInstance();
	// 	$sql = 'SELECT `medias`.`id_medias` AS `idMedias`,`medias`.`idRecipes` 
    // 	FROM `medias` 
    // 	WHERE  `idRecipes` = :idRecipes;';
	// 	$sth = $pdo->prepare($sql);
	// 	$sth->bindValue(':idRecipes', $id_medias, PDO::PARAM_INT);
	// 	return $sth->execute();
	// }

	public function updateRecipes(int $id_recipes): bool
    {
        $sql = 'UPDATE `recipes` SET 
                        `recipes`.`title`= :title,
     					`recipes`.`ingredient`= :ingredient,
     					`recipes`.`description`= :description,
	 					`recipes`.`id_medias` = :id_medias,  
	 					`recipes`.`picture` = :picture,
                WHERE `recipes`.`id_recipes`= :id_recipes;';

        $sth = $this->pdo->prepare($sql);
        $sth->bindValue(':title', $this->getTitle());
        $sth->bindValue(':ingredient', $this->getIngredient());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':id_medias', $this->getId_medias());
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_recipes', $id_recipes, PDO::PARAM_INT);
        // return $sth->execute();
		if ($sth->execute()) {
            return ($sth->rowCount() > 0) ? true : false;
        }
    }

	
	public static function deleteRecipes($id_recipes)
	{
		$pdo = Database::getInstance();
		$sql = 'DELETE FROM `recipes` WHERE `id_recipes` = :id_recipes ;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':id_recipes', $id_recipes, PDO::PARAM_INT);
		return $sth->execute();
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