<?php

namespace Core\Model;

use Core\Base\Model;

class User extends Model
{

    const ADMIN = array(
        "item:read", "item:create", "item:update", "item:delete",
        "user:read", "user:create", "user:update", "user:delete",
        "transaction:create", "transaction:update", "transaction:delete", "transaction:read",
    );

    const  SELLER = array(
        "transaction:update", "transaction:delete", "transaction:create",
    );
    //Responsible for Stock management pagie
    const PROCUREMENT = array(
        "item:read", "item:create", "item:update", "item:delete"
    );
    const ACCOUNTANT = array(
        "transaction:update", "transaction:delete", "transaction:read",
    );


    public function check_username(string $username)
    {
        $result = $this->connection->query("SELECT * FROM $this->table WHERE username='$username'");
        if ($result) { // if there is an error in the connection or if there is syntax error in the SQL.
            if ($result->num_rows > 0) {
                return $result->fetch_object();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get_permissions(): array
    {
        $permissions = array();
        $user = $this->get_by_id($_SESSION['user']['user_id']);
        if ($user) {
             $permissions = \explode(',', $user->permissions);
           //$permissions = \unserialize($user->permissions);
        }
        return $permissions;
    }
}
// a:16:{i:0;s:9:"item:read";i:1;s:11:"item:create";i:2;s:11:"item:update";i:3;s:11:"item:delete";i:4;s:9:"user:read";i:5;s:11:"user:create";i:6;s:11:"user:update";i:7;s:11:"user:delete";i:8;s:18:"transaction:create";i:9;s:18:"transaction:update";i:10;s:18:"transaction:delete";i:11;s:16:"transaction:read";i:12;s:8:"tag:read";i:13;s:10:"tag:create";i:14;s:10:"tag:update";i:15;s:10:"tag:delete";}