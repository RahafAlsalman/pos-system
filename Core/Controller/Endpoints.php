<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\Transaction;
use Exception;
use Core\Helpers\Helper;

class Endpoints extends Controller
{
        use Tests;

        protected $request_body;
        protected $http_code = 200;

        protected $response_schema = array(
                "success" => true, // to provide the response status.
                "message_code" => "", // to provide message code for the front-end developer for a better error handling
                "body" => [],
        );


        function __construct()
        {
                $this->request_body = (array) json_decode(file_get_contents("php://input"));
        }

        public function render()
        {
                header("Content-Type: application/json"); // changes the header information
                http_response_code($this->http_code); // set the HTTP Code for the response
                echo json_encode($this->response_schema); // convert the data to json format
        }

        /**
         * get all data 
         *
         * @return array
         */

        function transactions()
        {

                try {
                        $item = new Item;
                        $this->data['items'] = $item->get_all();
                        $user_inf = new Transaction(); //get all information from all tabel(JOIN)
                        $this->data['user_inf'] = $user_inf->get_info();

                        $Transaction = new Transaction;
                        $Transactions = $Transaction->get_transaction_value();
                        $this->data['Transactions'] = $Transaction->get_transaction_value();
                        if (empty($Transactions)) {
                                throw new \Exception('No Transactions were found!');
                        }
                        $this->response_schema['body'] = $Transaction->lastInsertId();
                        $this->response_schema['message_code'] = "Transactions_collected_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['success'] = false;
                        $this->response_schema['message_code'] = $error->getMessage();
                        $this->http_code = 404;
                }
        }

        /**
         * create  transaction
         *
         * @return void
         */
        function transactions_create()
        {
                self::check_if_empty($this->request_body);
                try {
                        $user_inf = new Transaction(); //get all information from all tabel(JOIN)
                        $this->data['user_inf'] = $user_inf->get_info();
                        $transaction = new Transaction;
                        $this->data['transactions'] = $transaction->get_transaction_value();
                        $transaction->create($this->request_body);
                        $this->response_schema['message_code'] = "item_created_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['message_code'] = "item_was_not_created";
                        $this->http_code = 421;
                }
        }

        /**
         * updeate the Stock avilabel quantity 
         *
         * @return void
         */
        public function update()
        {

                self::check_if_empty($this->request_body);

                try {
                        if (!isset($this->request_body['id'])) {
                                $this->http_code = 422;
                                throw new \Exception('id_param_not_found');
                        }
                        $item = new Item;
                        $current_item = $item->get_by_id($this->request_body['id']);
                        $p = $current_item->stock_availabel_quntity = $current_item->stock_availabel_quntity - $this->request_body['quantity'];
                        $sql = "UPDATE items SET stock_availabel_quntity = '$p'
                        WHERE id={$this->request_body['id']}";
                        $item->connection->query($sql);
                        $this->response_schema['message_code'] = "item_update_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['message_code'] = "item_was_not_update";
                        $this->http_code = 421;
                }
        }

        /**
         * updeate the quntity on transaction
         *
         * @return void
         */
        public function updateQuntity()
        {

                self::check_if_empty($this->request_body);

                try {
                        if (!isset($this->request_body['id'])) {
                                $this->http_code = 422;
                                throw new \Exception('id_param_not_found');
                        }
                        $transaction = new Transaction;
                        $transaction->get_by_id($this->request_body['id']);
                        $z = $this->request_body['quantity'];
                        $sql = "UPDATE transactions SET quantity ='$z'
                        WHERE id={$this->request_body['id']}";
                        $transaction->connection->query($sql);
                        $this->response_schema['message_code'] = "item_update_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['message_code'] = "item_was_not_update";
                        $this->http_code = 421;
                }
        }

        /**
         * deletes the quntity on transaction
         *
         * @return void
         */
        public function delete()
        {

                self::check_if_empty($this->request_body);

                try {
                        if (!isset($this->request_body['id'])) {
                                $this->http_code = 422;
                                throw new \Exception('id_param_not_found');
                        }
                        $transaction = new Transaction;
                        $sql = "DELETE FROM transactions WHERE id={$this->request_body['id']}";
                        $transaction->connection->query($sql);
                        $this->response_schema['message_code'] = "item_delete_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['message_code'] = "item_was_not_delete";
                        $this->http_code = 421;
                }
        }
        /**
         * Displays Selling page
         *
         * @return void
         */
        public function ajax()
        {
                $this->permissions(['transaction:create']);
                $this->view = "transactions.create";
                $item = new Item; // new model items.
                $this->data['items'] = $item->get_all();
                $transaction = new Transaction; // new model transactions.
                $this->data['transactions'] = $transaction->get_transaction_value();
                $user_inf = new Transaction(); //get all information from all tabel(JOIN)
                $this->data['user_inf'] = $user_inf->get_info();
                // $this->data['transactions'] = $transaction->get_by_id($_POST['id']);
                //  $this->data['transactions_count'] = count($transaction->get_all());
        }
}
