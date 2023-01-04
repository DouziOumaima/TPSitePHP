<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";

class UserController
{

    private $id;
    private $username;
    private $email;
    private $password;
    private $avatar;
    private $cover;
    private $role;
    private $posts = [];

    private $userModel; // pour ajouter des users dand la DB

    private const MIN_PASSWORD_LENGTH = 6;

    private const MIN_USERNAME_LENGTH = 3;

    function __construct(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

        $this->userModel = new UserModel($username, $email, $password);
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }



    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of cover
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }



    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Set the value of cover
     *
     * @return  self
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    function isEmailValid(): bool // verfier que l'email est valid (a une format email)
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    function isUsernameValid(): bool // pour verifier que le username il a au moins 3 caractéres
    {
        return strlen($this->username) >= self::MIN_USERNAME_LENGTH;
    }

    function isPasswordValid(): bool // verifier que le password a au moins 6 caractéres
    {
        return strlen($this->password) >= self::MIN_PASSWORD_LENGTH;
    }
    function isDataValid(): bool
    {
        return $this->isEmailValid() && $this->isPasswordValid() && $this->isUsernameValid();
    }

    function exist()
    {
        $userModel = new UserModel($this->username, $this->email, $this->password);

        $userTab = $userModel ->fetch();// fetch elle retourne la valeur qu'elle a trouver dans la DB
        var_dump($userTab);
    if (count($userTab) === 0) {
      return false;
    }
}
}
