<?php
namespace Core\Controller;
use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\transaction;

class Transactions extends Controller
{

    use Tests;

    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        
        $this->auth();
      $this->admin_view(true);
    }

    /**
     * Gets all transaction
     *
     * @return array
     */
    public function index()
    {
       $this->permissions(['transaction:read']);
        $this->view = 'transactions.index';
        $item=new Item;
        $transaction = new Transaction; // new model items.
        $this->data['items'] = $item->get_all();
        $this->data['transactions'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
        $user=new Transaction();
        $this->data['users'] = $user->get_info();
        // $this->data['transactions_quantity'] = count($transaction->get_all());
        
    }

    public function single()
    {

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

        $this->permissions(['transaction:read']);
        $this->view = 'transactions.singel';
        $transaction = new Transaction(); 
        $selected_transaction= $this->data['transaction'] = $transaction->get_by_id($_GET['id']);
        $date = new \DateTime($selected_transaction->created_at);
        $selected_transaction->created_at = $date->format('d/m/Y');
        $user_inf=new Transaction();//get all information from all tabel(JOIN)
        $this->data['user_inf'] = $user_inf->get_info();
        $item=new Item;
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }
   
    /**
     * Display the HTML form for transaction creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['transaction:create']);
        $this->view = 'transactions.create';
        $item=new Item();
        $this->data['items'] = $item->get_all();

    }

    /**
     * Creates new transaction
     *
     * @return void
     */
    public function store()
    {
       $this->permissions(['transaction:create']);
        $transaction = new Transaction();
       // this is the id of the current logged in user. Because the post creator would be the same logged in user.
       $transaction->create($_POST);
      
        Helper::redirect('/transactions');
    }

    public function edit()
    {
        $this->permissions(['transaction:read', 'transaction:update']);
        $this->view = 'transactions.edit';
        $transaction = new Transaction();
     
        $selected_transaction = $transaction->get_by_id($_GET['id']);
        $this->data['transaction'] = $selected_transaction;
    }

    /**
     * Updates the transaction
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['transaction:read', 'transaction:update']);
        $transaction = new Transaction();
        $transaction->update($_POST);
        Helper::redirect('/transactions?id=' . $_POST['id']);
    }
    

    /**
     * Delete the transaction
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['transaction:read', 'transaction:delete']);
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/transactions');
    }

    public function seller()
    {
        $this->permissions(['transaction:create']);
         $this->view = "transactions.singelseller";
         $transaction = new Transaction; // new model transactions.
         $this->data['transactions'] = $transaction->get_transaction_today();
         
        //  $this->data['transactions'] = $transaction->get_by_id($_REQUEST['id']);
        //  $this->data['transactions_count'] = count($transaction->get_all());
    }
    
}



