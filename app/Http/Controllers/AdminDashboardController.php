<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.dashboard');
    }

}