<?php
include_once "model.php";
class User extends Model{
    private string $username;
    private string $email;
    private string $password;

    public function authorize(PDO $pdo, string $email, string $pswrd){
        $query = $pdo->prepare('SELECT id, email, password, username FROM users WHERE email = :email and password = :password');

        $query->bindParam('email', $email);
        $query->bindParam('password', $pswrd);
        $query->execute();

        $data = $query->fetch();

        if($data){
            $this->changeName($data['username']);
            $this->changePassword($data['password'], false);
            $this->changeEmail($data['email']);

            Session::set('user', serialize($this));
        }
        else{
            ServerModal::staticThrowModal('Ошибка авторизации: неверные данные', true, 'auth');
            die;
        }

        ServerModal::staticThrowModal('Авторизация прошла успешно', false, '../cond');
    }

    public function register(PDO $pdo, string $username, string $email, string $password){
        require_once 'checking_module.php';
        // check the data

        $res = validateName($username);
        if($res[0] == 1){
            ServerModal::staticThrowModal($res[1], $res[0], 'reg');
            die;
        }
        $res = validateEmail($email);
        if($res[0] == 1){
            ServerModal::staticThrowModal($res[1], $res[0], 'reg');
            die;
        }

        $password = hash('sha256', $password);

        $query = $pdo->prepare('INSERT INTO users(username, email, password) VALUES (:name, :email, :password)');
        $query->bindValue('name', $username);
        $query->bindValue('email', $email);
        $query->bindValue('password', $password);

        if(!$query->execute()){
            ServerModal::staticThrowModal('Ошибка создания пользователя', true, 'reg');
            die;
        }

        $this->changeEmail($email);
        $this->changeName($username);
        $this->changePassword($password, false);
        Session::set('user', serialize($this));
        ServerModal::staticThrowModal('Пользователь создан успешно', false, 'catalogue');
    }

    public function getName(){
        return $this->username;
    }
    public function getEmail(bool $encrypt = false){
        $enctryptedEmail = $this->email[0].$this->email[1].'*********@'.explode('@', $this->email)[1];
        return $encrypt ? $enctryptedEmail : $this->email;
    }
    public function changeName(string $username){
        $this->username = $username;
    }
    public function changeEmail(string $email){
        $this->email = $email;
    }
    public function changePassword(string $password, bool $hash = true){
        if($hash){
            $password = hash('sha256', $password);
        }
        $this->password = $password;
    }

    // TODO: add changeByObject and changeByDBTable. one for changing the DB table object from class variables and one for the opposite thing.
}