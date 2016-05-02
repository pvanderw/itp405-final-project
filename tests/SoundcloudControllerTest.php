<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SoundcloudControllerTest extends TestCase
{
    public function testShowTrack()
    {
    	$this
    		->visit('/track/62830331')
    		->see('Footloose - Blake Shelton');
    }

    public function testFilters()
    {
    	$this
    		->visit('/login')
    		->type('pvanderw@gmail.com', 'email')
    		->type('password', 'password')
    		->press('Login')
    		->visit('/discover')
    		->select('House', 'genre')
    		->type('Oliver Heldens', 'artist')
    		->press('Filter Songs')
    		->see('Zeds Dead & Oliver Heldens - You Know (Original Mix)');
    }

    public function testArtistInput()
    {
    	$this
    		->visit('/login')
    		->type('pvanderw@gmail.com', 'email')
    		->type('password', 'password')
    		->press('Login')
    		->visit('/discover')
    		->type(';;--1312', 'artist')
    		->press('Filter Songs')
    		->see('The artist format is invalid.');
    }

    public function testMinDate()
    {
    	$this
    		->visit('/login')
    		->type('pvanderw@gmail.com', 'email')
    		->type('password', 'password')
    		->press('Login')
    		->visit('/discover')
    		->type(';;--1312', 'min_date')
    		->press('Filter Songs')
    		->see('The min date format is invalid.');
    }

    public function testMaxDate()
    {
    	$this
    		->visit('/login')
    		->type('pvanderw@gmail.com', 'email')
    		->type('password', 'password')
    		->press('Login')
    		->visit('/discover')
    		->type(';;--1312', 'max_date')
    		->press('Filter Songs')
    		->see('The max date format is invalid.');
    }

    public function testMinBPM()
    {
    	$this
    		->visit('/login')
    		->type('pvanderw@gmail.com', 'email')
    		->type('password', 'password')
    		->press('Login')
    		->visit('/discover')
    		->type(';;--1312', 'min_bpm')
    		->press('Filter Songs')
    		->see('The min bpm must be a number.');
    }

    public function testMaxBPM()
    {
    	$this
    		->visit('/login')
    		->type('pvanderw@gmail.com', 'email')
    		->type('password', 'password')
    		->press('Login')
    		->visit('/discover')
    		->type(';;--1312', 'max_bpm')
    		->press('Filter Songs')
    		->see('The max bpm must be a number.');
    }
}
