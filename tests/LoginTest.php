<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    public function testSuccessfulLogin()
    {
    	$this
    		->visit('/login')
    		->type('pvanderw@gmail.com', 'email')
    		->type('password', 'password')
    		->press('Login')
    		->seePageIs('/');
    }

    public function testFailedLogin()
    {
    	$this
    		->visit('/login')
    		->type('test', 'email')
    		->type('wrong', 'password')
    		->press('Login')
    		->see('These credentials do not match our records.');
    }

    public function testEmptyEmail()
    {
    	$this
    		->visit('/login')
    		->type('wrong', 'password')
    		->press('Login')
    		->see('The email field is required.');
    }

    public function testEmptyPassword()
    {
    	$this
    		->visit('/login')
    		->type('test', 'email')
    		->press('Login')
    		->see('The password field is required.');
    }
}
