<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class PostsFixture extends TestFixture
{
    public $import = ['table' => 'posts'];

    public $records = [
        [
            'id' => 1,
            'title' => 'First Post',
            'body' => 'This is the first post.',
            'created' => '2023-01-01 00:00:00',
            'modified' => '2023-01-01 00:00:00',
        ],
        [
            'id' => 2,
            'title' => 'Second Post',
            'body' => 'This is the second post.',
            'created' => '2023-01-02 00:00:00',
            'modified' => '2023-01-02 00:00:00',
        ],
    ];
}
