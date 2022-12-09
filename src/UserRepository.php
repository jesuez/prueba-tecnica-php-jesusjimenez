<?php
declare(strict_types=1);
class UserRepository
{
 	protected MyDB $db;

    function __construct(MyDB $connector) {
		$this->db = $connector;
    }

    public function insert(User $user): User {
		$name = $user->getName();
		$email = $user->getEmail();
	   $sql =<<<EOF
	      INSERT INTO users (name,email) VALUES ('$name', '$email');
EOF;

	   $ret = $this->db->query($sql);
	   if(!$ret) throw new Exception(sprintf('El usuario solicitado no existe'));
	   $user->setId($this->db->lastInsertRowID());
	   return $user;
    }

    public function getByIdOrFail($id): User {
   	$sql =<<<EOF
      SELECT * from users Where id=$id;
EOF;
	   $ret = $this->db->query($sql);
	   $result = $ret->fetchArray(SQLITE3_ASSOC)??null;
	   if(!$result) throw new Exception(sprintf('El usuario solicitado no existe'));
	   return new User($result['id'],$result['name'],$result['email']);
	}

    public function update(User $user): bool {
		$id = $user->getId();
		$name = $user->getName();
		$email = $user->getEmail();
	   $sql =<<<EOF
	      UPDATE users set name = '$name', email = '$email' WHERE id = $id;
EOF;
		$ret = $this->db->exec($sql);
	   
	   return !$ret ? false : true;
    }

    public function delete(int $id): bool {

	   $sql =<<<EOF
	      DELETE from users WHERE id = $id;
EOF;
	
	   $ret = $this->db->exec($sql);
	   
	   return !$ret ? false : true;
    }

}