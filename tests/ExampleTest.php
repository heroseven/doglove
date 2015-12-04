<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        
        $method="GET";
        $uri="mascotas/1";
        $response = $this->call($method, $uri);
        // $response = $this->call('GET', 'mascotas/1');
        $this->assertEquals('Firilays', $response->getContent());
    }
    
    
     public function testBasicExample2()
    {
        
        $method="GET";
        $uri="mascotas/1";
        $response = $this->call($method, $uri);
        // $response = $this->call('GET', 'mascotas/1');
        $this->assertEquals('Firilays', $response->getContent());
    }
}
