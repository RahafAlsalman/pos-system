<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\item;
use Core\Model\Tag;
use Core\Model\User;

class Items extends Controller
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
    }

    /**
     * Gets all items
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['item:read']);
        $this->view = 'items.index';
        $item = new Item; // new model items.
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }
    /**
     * Display single item
     *
     */
    public function single()
    {

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

        $this->permissions(['item:read']);
        $this->view = 'items.single';
        $item = new Item();
        $selected_item =  $this->data['item'] = $item->get_by_id($_GET['id']);
        $date = new \DateTime($selected_item->created_on);
        $selected_item->created_on = $date->format('d/m/Y');
    }

    /**
     * Display the HTML form for item creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['item:create']);
        $this->view = 'items.create';
        // $selected_item>content = \htmlspecialchars($selected_post->content);

        // $selected_item->tags = $final_tags;
        // $this->data['post'] = $selected_post;
    }

    /**
     * Creates new post
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['item:create']);
        $item = new Item();
        // this is the id of the current logged in user. Because the post creator would be the same logged in user.
        $item->create($_POST);

        Helper::redirect('/items');
    }
    /**
     * Display the HTML form for item update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['item:read', 'item:update']);
        $this->view = 'items.edit';
        $item = new Item();

        $selected_item = $item->get_by_id($_GET['id']);
        //  $selected_item->tags = $tag->get_all();
        $this->data['item'] = $selected_item;
    }

    /**
     * Updates the item
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['item:read', 'item:update']);
        $item = new Item();
        $item->update($_POST);
        Helper::redirect('/item?id=' . $_POST['id']);
    }

    /**
     * Delete the item
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['item:read', 'item:delete']);
        $item = new Item();
        $item->delete($_GET['id']);
        Helper::redirect('/items');
    }
}
