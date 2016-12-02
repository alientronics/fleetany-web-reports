<?php

namespace Tests;

use Tests\AcceptanceTestCase;

class PagesTest extends AcceptanceTestCase
{

    public function testAbout()
    {
        $this->get('/about');
        $this->assertEquals($this->response->status(), 200);
    }

    public function testHome()
    {
        $this->get('/home');
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testPricing()
    {
        $this->get('/pricing');
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testPrivacy()
    {
        $this->get('/privacy');
        $this->assertEquals($this->response->status(), 200);
    }
    
    public function testTos()
    {
        $this->get('/tos');
        $this->assertEquals($this->response->status(), 200);
    }
}
