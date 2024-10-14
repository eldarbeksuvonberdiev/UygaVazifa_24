<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Models\Muallif;

class MuallifController
{
    public function __construct()
    {
        if(!Auth::check()){
            header("location:/login");
        }
    }

    public function index()
    {
        $models = Muallif::all();
        return view('Muallif/index', 'Students', $models);
    }

    public function createMuallif()
    {
        return view('Muallif/create', "Muallif qo'shish");
    }

    public function create()
    {
        if (isset($_POST['ok'])) {
            $data = [
                'name' => $_POST['name']
            ];
            Muallif::create($data);
            header("location: /muallif");
        }
    }

    public function delete()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            Muallif::delete($id);
            header("location: /muallif");
        }
    }

    public function show()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Muallif::show($id);
            return view('Muallif/show', 'Show Student info', $models);
        }
    }

    public function edit()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $models = Muallif::show($id);
            return view('Muallif/edit', 'Muallif tahrirlash', $models);
        }
    }

    public function update()
    {
        if (isset($_POST['ok'])) {
            $id = $_POST['id'];
            $data = [
                'name' => $_POST['name']
            ];
            $models = Muallif::update($data, $id);
            header("location: /muallif");
        }
    }
}
