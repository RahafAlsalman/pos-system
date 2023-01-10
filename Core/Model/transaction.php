<?php

namespace Core\Model;

use Core\Base\Model;
use LDAP\Result;
use mysqli;

class Transaction extends Model

{
 
    public function lastInsertId(): array
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM transactions ORDER BY transactions.id DESC LIMIT 1;");
      

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }

public function get_info():array{
    $data = array();

    $result = $this->connection->query ("SELECT transactions.id,price,total,quantity,item_id, users.display_name,email,items.item_name,stock_availabel_quntity FROM transactions INNER JOIN users ON transactions.user_id = users.id INNER JOIN items ON transactions.item_id=items.id;");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
      
    }
    return $data;
}
public function get_transaction_today():array{
    $data = array();

    $result = $this->connection->query ("SELECT transactions.id,price,total,quantity,item_id, transactions.created_at, users.display_name,email,items.item_name,stock_availabel_quntity FROM transactions INNER JOIN users ON transactions.user_id = users.id INNER JOIN items ON transactions.item_id=items.id WHERE DATE( transactions.created_at) = CURDATE();");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
      
    }
    return $data;
     }

}




 
 



// public function get_selling_price()
    // {
    //     $result = $this->connection->query(" SELECT transactions.id, item_id,selling_price, quantity,total FROM transactions INNER JOIN items ON transactions.id=items.id");
    //     if ($result) { // if there is an error in the connection or if there is syntax error in the SQL.
    //                 if ($result->num_rows > 0) {
    //                     return $result->fetch_object();
    //                 } else {
    //                     return false;
    //                 }
    //             } else {
    //                 return false;
    //             }

    

    //  public function join()
    //  { 
    //     $result = $this->connection->query ("SELECT transactions.id, item_id, quantity,total FROM transactions INNER JOIN items WHERE transactions.item_id=items.id;
    //     ");
    //     if ($result) { // if there is an error in the connection or if there is syntax error in the SQL.
    //         if ($result->num_rows > 0) {
    //             return $result->fetch_object();
    //         } else {
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    //  }
    