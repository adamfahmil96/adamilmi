<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $skills = Skill::ordered()->get()->groupBy('category');
        $experiences = Experience::ordered()->get();
        $featuredProjects = Project::featured()->ordered()->limit(6)->get();
        $latestPosts = Post::published()->with('category')->latest()->limit(3)->get();

        return view('pages.home', compact(
            'skills',
            'experiences',
            'featuredProjects',
            'latestPosts'
        ));
    }
}
