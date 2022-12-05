<?php

namespace App\Http\Controllers;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function show($urlname)
    {
        $page = StaticPage::where('urlname','=',$urlname)->firstOrFail();
        return view($page->view,['title'=>$page->title,'content'=>$page->content]);
    }
}
