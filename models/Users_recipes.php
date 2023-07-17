<?php

class Users_recipes
{
    private $id_users;
    private $id_recipes;
    private object $pdo;

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
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param mixed $id_genres 
     * @return self
     */
    public function setPdo($pdo): self
    {
        $this->pdo = $pdo;
        return $this;
    }

    // public static function recipesLike($id_users)
	// {
	// 	$pdo = Database::getInstance();
	// 	$sql = 'SELECT `recipes`.`id_recipes` FROM `recipes`
	// 	INNER JOIN `user_recipes` ON `user_recipes`.`id_recipes` = `recipes`.id_recipes
	// 	WHERE `user.recipes`.id_users = :id_users ;';
	// 	$sth = $pdo->prepare($sql);
	// 	$sth->bindValue(':id_users', $id_users, PDO::PARAM_STR_CHAR);
	// 	$sth->execute();
	// 	return $sth->fetchAll();
	// }


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
