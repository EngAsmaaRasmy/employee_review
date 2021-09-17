<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $users = UsersReview::groupBy("reviewee_id")->get();

        return view('Performance.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('Performance.edit', compact('user'));
    }
    public function create()
    {
        return view('Performance.create');
    }

}
