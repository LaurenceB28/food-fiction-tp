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
	public function getPdo(): object {
		return $this->pdo;
	}
	
	/**
	 * @param object $pdo 
	 * @return self
	 */
	public function setPdo(object $pdo): self {
		$this->pdo = $pdo;
		return $this;
	}

	public static function recipes()
	{
		$pdo = Database::getInstance();
		$sth = $pdo->query('SELECT `id_recipes`,`title`FROM `recipes`;');
		return $sth->fetchAll(PDO::FETCH_OBJ);
	}
	public static function search($search)
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT * FROM `recipes` WHERE `title` LIKE  :search OR  `ingredients` LIKE :search ;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':search', '%' . $search . '%'); //'%'=(commence par).$search. '%' permet la recherche soit par la premiere lettre ou par les suivantes ex: 'Lau' ou 'au'//
		$sth->execute();
		return $sth->fetchAll(PDO::FETCH_OBJ);
	}

	public static function pagination($page)
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT * FROM `recipes` 
    ORDER BY `id_recipes` 
    LIMIT 10 OFFSET :paging ;'; /* $offset ou 0*/
		$page = ($page - 1) * 10;
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':paging', $page, PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetchAll();
	}

	public static function count()
	{
		$pdo = Database::getInstance();
		$sql = 'SELECT COUNT(*) AS `idCount` FROM `recipes`;';
		$sth = $pdo->query($sql);
		return $sth->fetch(PDO::FETCH_OBJ);
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
