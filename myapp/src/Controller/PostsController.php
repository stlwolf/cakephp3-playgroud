<?php
namespace App\Controller;

use App\Controller\AppController;

class PostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $posts = $this->Posts->find('all');
        $this->set([
            'posts' => $posts,
            '_serialize' => ['posts']
        ]);

        $this->RequestHandler->renderAs($this, 'json'); // Add this line
    }

    public function view($id)
    {
        $post = $this->Posts->get($id);
        $this->set([
            'post' => $post,
            '_serialize' => ['post']
        ]);

        $this->RequestHandler->renderAs($this, 'json'); // Add this line
    }

    public function add()
    {
        $post = $this->Posts->newEntity($this->request->getData());
        if ($this->Posts->save($post)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'post' => $post,
            '_serialize' => ['message', 'post']
        ]);

        $this->RequestHandler->renderAs($this, 'json'); // Add this line
    }

    public function edit($id)
    {
        $post = $this->Posts->get($id);
        if ($this->request->is(['post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);

        $this->RequestHandler->renderAs($this, 'json'); // Add this line
    }

    public function delete($id)
    {
        $post = $this->Posts->get($id);
        $message = 'Deleted';
        if (!$this->Posts->delete($post)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);

        $this->RequestHandler->renderAs($this, 'json'); // Add this line
    }
}
