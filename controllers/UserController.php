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
    private $RePassword;
    private $posts = [];

    private $userModel; // pour ajouter des users dand la DB

    private const MIN_PASSWORD_LENGTH = 6;

    private const MIN_USERNAME_LENGTH = 3;

    function __construct(string $username, string $email, string $password, string $RePassword)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->RePassword = $RePassword;

        $this->userModel = new UserModel($username, $email, $password, $RePassword);
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

    function isPasswordSame(): bool
    {
        return $this->password === $this->RePassword;
    }


    function isDataValid(): bool
    {
        return $this->isEmailValid() && $this->isPasswordValid() && $this->isUsernameValid() && $this->isPasswordSame();
    }

    function exist()
    {
        $userModel = new UserModel($this->username, $this->email, $this->password, $this->RePassword);

        $userTab = $userModel->fetch(); // fetch elle retourne la valeur qu'elle a trouver dans la DB
        // var_dump($userTab);
        if (count($userTab) === 0) {
            return false;
        } else {
            return true;
        }
    }
    function isPasswordCorrect()
    {
        $userFromDB = $this->userModel->fetch();

        return $userFromDB['password'] === $this->password;
    }

    function signupUser()
    {
        //Utiliser une class UserModel pour ajouter les user dans la DB.
        $userModel = new UserModel($this->username, $this->email, $this->password, $this->RePassword);
        $userModel->addToDB();
        // apres cette etape il faut créer une function exist
        // on va instancier notre userModel($userModel = new UserModel($this-> ...)) Apres faut avoir une var UserTab et créer une fetch pour aller chercher avec email l'utilisateur et vas nous rendre un Tab Asso qui represente l'utilisateur si elle l'a trouver sinon elle va rendre false si y'a 2 fois l'utilisateur
    }

    // --> le cas de email  pas valid et password  pas valid : retourner emailError=InputInvalid & passwordError=InputInvalid
    function getErrors()
    {
        // Si username pas valid : UsernamError=InputInvalid
        $errors = [];
        !$this->isUsernameValid() ? array_push($errors, "usernameError=InputInvalid") : null;
        // email pas Valid et password valid : emailError=InputInvalid
        !$this->isEmailValid() ? array_push($errors, "emailError=InputInvalid") : null;
        // si email valid et password pas valid returner passwordError=InputInvalid
        !$this->isPasswordValid() ? array_push($errors, "passwordError=InputInvalid") : null;

        !$this->isPasswordSame() ? array_push($errors, "RePasswordError=InputInvalid") : null;

        return join("&", $errors);

        // explication de join dans js : contraire de join implode
        // <script> let a =['a', 'b','c'];
        //let aText = a.join('&'); -> "a&b&c" rajout des & entre les string
        // </script>

    }
    function getConnexionErrors(){

        $errors = [];
        !$this->isEmailValid() ? array_push($errors, "emailError=InputInvalid") : null;

        !$this->isPasswordValid() ? array_push($errors, "passwordError=InputInvalid") : null;

        return join("&", $errors);
        
        //var_dump( 'getConnexionErrors');
        //var_dump ('errors');
    }

    /**
     * Get the value of RePassword
     */
    public function getRePassword()
    {
        return $this->RePassword;
    }
}
