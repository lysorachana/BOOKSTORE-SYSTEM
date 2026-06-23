<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreBookRequest extends Controller
{
    public function authorize(): bool
{
    return false; 
}
}
