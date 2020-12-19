<?php


namespace Denis\MVC\Controllers;


interface Controller
{
    public function index();

    public function store();

    public function show();

    public function update();
    
    public function destroy();

    public function create();
}