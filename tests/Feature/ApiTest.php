<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class ApiTest
 * @package Tests\Feature
 */
class ApiTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * migrate and seed database
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * get comment list
     */
    public function testGetCommentList()
    {
        $response = $this->getJson('/api/comments');


        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'error',
                'message',
                'data' => [
                    'commentList' => []
                ]
            ]);
    }

    /**
     * add new comment to post
     */
    public function testAddNewComment()
    {
        $response = $this->postJson('/api/comments', [
            'replyCommentText' => 'Test Comment'
        ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'error',
                'message',
                'data' => [
                    'createdComment' => []
                ]
            ]);
    }

    /**
     * reply to existent comment
     */
    public function testReplyComment()
    {
        $response = $this->postJson('/api/comments/15', [
            'replyCommentText' => 'Test Comment'
        ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'error',
                'message',
                'data' => [
                    'createdComment' => []
                ]
            ]);
    }

    /**
     * reply to nonexistent comment
     */
    public function testReplyToNonexistentComment()
    {
        $response = $this->postJson('/api/comments/30', [
            'replyCommentText' => 'Test Comment'
        ]);

        $response
            ->assertStatus(404)
            ->assertJsonStructure([
                'error',
                'message',
                'data'
            ]);
    }

    /**
     * update existent comment
     */
    public function testUpdateComment()
    {
        $response = $this->patchJson('/api/comments/1', [
            'replyCommentText' => 'Test Comment updated'
        ]);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'error',
                'message',
                'data' => [
                    'updatedComment' => []
                ]
            ]);
    }

    /**
     * delete existent comment
     */
    public function testDeleteComment()
    {
        $response = $this->deleteJson('/api/comments/1');

        $response
            ->assertStatus(204);
    }
}
