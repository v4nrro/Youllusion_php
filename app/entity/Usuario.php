<?php 

namespace youllusion\app\entity;

use youllusion\app\entity\IEntity;

class Usuario implements IEntity {
	private $id;
	private $username;
    private $password;
    private $role;
	
	public function __construct($username = "", $password = "", $role = "") {
		$this->id = null;
		$this->username = $username;
        $this->password = $password;
        $this->role = $role;
	}
	
    // Getters
	public function getId(): ?int {
		return $this->id;
	}
	
	public function getUsername() {
		return $this->username;
	}
	
    public function getPassword() {
        return $this->password;
    }
    
    public function getRole() {
        return $this->role;
    }

    // Setters
    public function setUsername(string $username) : Usuario{
        $this->username = $username;
        return $this;
    }
    
    public function setPassword(string $password) : Usuario{
        $this->password = $password;
        return $this;
    }

    public function setRole(string $role) : Usuario{
        $this->role = $role;
        return $this;
    }
	
    // IEntity
    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'role' => $this->getRole()
        ];
    }

    public function __toString(){
        return $this->getUsername();
    }

}