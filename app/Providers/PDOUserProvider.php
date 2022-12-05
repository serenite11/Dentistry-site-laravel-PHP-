<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use \Illuminate\Contracts\Auth\UserProvider as UserProvider;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Auth\GenericUser as GenericUser;
use \Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
use PDO;

class PDOUserProvider implements UserProvider{
    public function conn(){
        return DB::connection()->getPdo();
    }
      /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier){
        /*
        $row=$this->conn()->query("SELECT * FROM users WHERE id=".$identifier)->fetch();
        if($row)
        return $this->getGenericUser($row);*/
        return \App\Models\User::find($identifier);
    }
    public function retrieveByCredentials(array $credentials){
        $sth = $this->conn()->prepare('SELECT * FROM users WHERE (login = :login OR email = :email OR tel = :tel) AND password = :password');
        $sth->bindParam(':login', $credentials['login'], PDO::PARAM_STR);
        $sth->bindParam(':email', $credentials['login'], PDO::PARAM_STR);
        $sth->bindParam(':tel', $credentials['login'], PDO::PARAM_STR);
        $sth->bindParam(':password', $credentials['password'], PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch();
        return \App\Models\User::find($row['id']);
    }
    protected function getGenericUser($user)
    {
        if (! is_null($user)) {
            return new GenericUser((array) $user);
        }
    }

    public function validateCredentials(Authenticatable $user, array $credentials){
       return $credentials['password']==$user->password;
    }

    public function retrieveByToken($identifier, $token){

    }

    public function updateRememberToken(Authenticatable $user, $token){

    }
}

