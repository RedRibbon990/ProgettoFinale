<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome() {
        $announcements = Announcement::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');
        return view('welcome', compact('announcements'));
    }
    
    public function categoryShow(Category $category)
    {
        $announcements = Announcement::where('category_id', $category->id)
            ->where('is_accepted', true)
            ->orderBy('created_at', 'DESC')
            ->get();
        
        return view('categoryShow', compact('category'));
    }
    

    public function searchAnnouncements(Request $request)
    {
        $searchTerm = $request->search_query;
        $announcements = Announcement::search($searchTerm)->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements'));
    }
    
    public function setLanguage($lang)
    {
            session()->put('locale', $lang);
            return redirect()->back();
    }
}