<?php

class Usuario {
    private $id;
    private $email;
    private $password;
    private $nombre;
    private $apellido;
    private $db;
    private $usuarios;


    public function __construct() {
        $this->db = Connect::connectionPDO();
		$this->usuarios = array();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getUsuarioByEmailAndPassword($email, $password) {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE email = :email AND password = :password');
        $stmt->execute(array(':email' => $email, ':password' => $password));
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$result) {
            return null;
        }
    
        $usuario = new Usuario();
        $usuario->setId($result['id']);
        $usuario->setEmail($result['email']);
        $usuario->setNombre($result['nombre']);
        $usuario->setApellido($result['apellido']);
    
        return $usuario;
    }


    public function getUsuarioById($id) {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE id = :id');
        $stmt->execute(array(':id' => $id));

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        $usuario = new Usuario();
        $usuario->setId($result['id']);
        $usuario->setEmail($result['email']);
        $usuario->setNombre($result['nombre']);
        $usuario->setApellido($result['apellido']);

        return $usuario;
    }

    public function insertUsuario($email, $password, $nombre, $apellido) {
        $stmt = $this->db->prepare('INSERT INTO usuarios (email, password, nombre, apellido) VALUES (:email, :password, :nombre, :apellido)');
        $stmt->execute(array(':email' => $email, ':password' => $password, ':nombre' => $nombre, ':apellido' => $apellido));
    }

    public function updateUsuario($id, $email, $password, $nombre, $apellido) {
        $stmt = $this->db->prepare('UPDATE usuarios SET email = :email, password = :password, nombre = :nombre, apellido = :apellido WHERE id = :id');
        $stmt->execute(array(':id' => $id, ':email' => $email, ':password' => $password, ':nombre' => $nombre, ':apellido' => $apellido));
    }

    public function deleteUsuario($id) {
        $stmt = $this->db->prepare('DELETE FROM usuarios WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

}