<?php
namespace Core\Controller;
use Core\Base\Controller;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\Transaction;
use Core\Model\User;
use Core\Helpers\Helper;
class Dashboards extends Controller
{
    use Tests;

    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }
    /**
         * Displays Dashbord
         *
         * @return void
         */
    public function index()
    {
        
            $this->view="dashboard";
        $item = new Item; // new model items.
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
        $this->permissions(['item:read']);
        $transaction = new Transaction; // new model transactions.
        $this->data['transactions'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
        $total=new Transaction;
        $this->data['total_sum'] = $total->sum();
        $user = new User; // new model user.
        $this->data['users'] = $user->get_all();
        $this->data['users_count'] = count($user->get_all());
        $price=new Item;
        $this->data['top_selling_price']=$price->order();
       
        
    }
}
