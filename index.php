<?php
session_start();
use Core\Router;
use Core\Model\User;

spl_autoload_register(function ($class_name) {
  if (strpos($class_name, 'Core') === false)//to not incloud faker to the spl autolod
      return;
  $class_name = str_replace("\\", '/', $class_name); // \\ = \
  $file_path = __DIR__ . "/" . $class_name . ".php";
  require_once $file_path;
});


if (isset($_COOKIE['user_id']) && !isset($_SESSION['user'])) { // check if there is user_id cookie.
  // log in the user automatically
  $user = new User(); // get the user model
  $logged_in_user = $user->get_by_id($_COOKIE['user_id']); // get the user by id
  $_SESSION['user'] = array( // set up the user session that idecates that the user is logged in. 
      'username' => $logged_in_user->username,
      'display_name' => $logged_in_user->display_name,
      'user_id' => $logged_in_user->id,
      'is_admin_view' => true
  );
}

//difine the route 
//======================login for  web administrators=============

Router::get('/', 'authentication.login'); // Display login.php
Router::get('/logout', "authentication.logout"); // Log the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form
Router::get('/dashboard', "dashboards.index"); // Displays the home page

//======================== USERS ================================

// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single post (HTML)
// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the post (PHP)

//======================== ITEMS =================================

//athenticated + permissions [item:read]
Router::get('/items', "items.index"); // list of items (HTML)
Router::get('/item', "items.single"); // Displays single item (HTML)
// athenticated + permissions [item:create]
Router::get('/items/create', "items.create"); // Display the creation form (HTML)
Router::post('/items/store', "items.store"); // Creates the items (PHP)
// athenticated + permissions [item:read, item:create]
Router::get('/items/edit', "items.edit"); // Display the edit form (HTML)
Router::post('/items/update', "items.update"); // Updates the items (PHP)
// athenticated + permissions [item:read, item:detele]
Router::get('/items/delete', "items.delete"); // Delete the item (PHP)

//========================TRANSACTIONS===============================

//ath:enticated + permissions [transaction:read]
Router::get('/transactions', "transactions.index"); // list of transactions (HTML)
Router::get('/transaction', "transactions.single"); // Displays single transaction (HTML)
// athenticated + permissions [transaction:create]
Router::get('/transactions/create', "transactions.create"); // Display the creation form (HTML)
Router::post('/transactions/store', "transactions.store"); // Creates the transactions (PHP)
// athenticated + permissions [transaction:read, transaction:create]
Router::get('/transactions/edit', "transactions.edit"); // Display the edit form (HTML)
Router::post('/transactions/update', "transactions.update"); // Updates the transactions (PHP)
// athenticated + permissions [transaction:read, transaction:detele]
Router::get('/transactions/delete', "transactions.delete"); // Delete the transaction (PHP)
Router::get('/transaction/seller', "transactions.seller");  // Displays singl seller (HTML)
//==================PROFIELS=====================================

Router::get('/profiles', "profiles.index"); // Display the edit form (HTML)
Router::get('/profiles/edit', "profiles.edit"); // Display the edit form (HTML)
Router::post('/profiles/update', "profiles.update"); // Updates the profiles (PHP)
Router::get('/profiles/editphoto', "profiles.store");

//==========================API====================================

//api requests
Router::get('/api/transactions', 'endpoints.transactions'); 
Router::post('/api/transactions/create', 'endpoints.transactions_create');// create the transactions
//this route is just for text the ajax
Router::put('/api/transactions/update', 'endpoints.update');// Updates the transactions
Router::delete('/api/transactions/delete','endpoints.delete');// Delete the transaction 
Router::get('/transactions/ajax','endpoints.ajax'); // Display the silling form (HTML)
Router::put('/api/transactions/update/quntity','endpoints.updateQuntity');

//========================instense to class===========================

//automtically it macke instense to class
Router::redirect();
