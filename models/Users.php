<?php
require_once __DIR__ . '/../helpers/connect.php';
class Users
{
    private $id_users;
    private $lastname;
    private $firstname;
    private $email;
    private $password;
    private $pseudo;
    private $picture;
    private $created_at;
    private $validated_at;
    private $updated_at;
    private $deleted_at;
    private $role;
    private object $pdo;

    public function __construct()
    {
        // hydratation de l'attribut $pdo grâce à la méthode statique "getInstance" et contenant notre objet PDO
        $this->pdo = Database::getInstance();
    }

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
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname 
     * @return self
     */
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname 
     * @return self
     */
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email 
     * @return self
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password 
     * @return self
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo 
     * @return self
     */
    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
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
     * @return mixed
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at 
     * @return self
     */
    public function setCreated_at($created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValidated_at()
    {
        return $this->validated_at;
    }

    /**
     * @param mixed $validated_at 
     * @return self
     */
    public function setValidated_at($validated_at): self
    {
        $this->validated_at = $validated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at 
     * @return self
     */
    public function setUpdated_at($updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleted_at()
    {
        return $this->deleted_at;
    }

    /**
     * @param mixed $deleted_at 
     * @return self
     */
    public function setDeleted_at($deleted_at): self
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role 
     * @return self
     */
    public function setRole($role): self
    {
        $this->role = $role;
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

    public function insert()
    {
        $pdo = Database::getInstance();
        $sql = 'INSERT INTO `users` (`lastname`, `firstname`, `email`, `password`,`picture`) 
        VALUES (:lastname, :firstname, :email, :password, :picture);';
        $sth = $pdo->prepare($sql);
        //Affectation des valeurs aux marqueurs nominatifs
        $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $sth->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
        $sth->bindValue(':picture', $this->getPicture(), PDO::PARAM_STR);
        // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
        return $sth->execute();
    }

    public static function getAll(?string $search = '', int $limit = null, int $offset = 0)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users` WHERE `firstname` LIKE  :search OR  `lastname` LIKE :search ';
        if (!is_null($limit)) {
            $sql .= ' LIMIT :limit OFFSET :offset';
        }

        $sql .= ';';

        // On prépare la requête
        // $sth = Database::getInstance()->prepare($sql);
        $sth = $pdo->prepare($sql);

        // On associe le marqueur nominatif à la valeur de search
        $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);

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
        $sql = 'SELECT COUNT(`id_users`) as `nbUsers` FROM `users`
                    WHERE `lastname` LIKE :search 
                    OR `firstname` LIKE :search;';

        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetchColumn();
    }

    

    /**
     * Summary of getByMail
     * @param mixed $email
     * @return mixed
     */
    public static function getByMail($email)
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT * FROM `users` WHERE `email`= :email ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->execute();
        return $sth->fetch();
    }

    public function update(int $id_users): bool
    {
        $pdo = Database::getInstance();
        $sql = 'UPDATE `users` SET 
     					`users`.`lastname`= :lastname,
     					`users`.`firstname`= :firstname,
	 					`users`.`email` = :email,  
	 					`users`.`password` = :password,  
	 					`users`.`email` = :email,  
	 					-- `users`.`picture` = :picture,
                WHERE `users`.`id_users`= :id_users;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $sth->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
        // $sth->bindValue(':picture', $this->getPicture(), PDO::PARAM_STR);
        $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
        return $sth->execute();
    }


    public static function delete($id_users)
	{
		$pdo = Database::getInstance();
		$sql = 'DELETE FROM `users` WHERE `id_users` = :id_users ;';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
		return $sth->execute();
	}

    
}
