<?php
/**
 * Created by PhpStorm.
 * User: veadigop
 * Date: 01/05/2018
 * Time: 15:42
 */

namespace App\Http\Controllers\Portfolio;


use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio.index');
    }
}