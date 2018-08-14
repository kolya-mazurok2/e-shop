<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 13.08.2018
 * Time: 14:37
 */

namespace App\Http\Controllers\Admin;


class AdminController
{
    public function index() {

        return view('admin.dashboard');
    }
}