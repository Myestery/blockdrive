<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilemanagerController extends Controller
{

    /**
     * Display filemanager of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Filemanager";
        $description = "View your files";
        return view('pages.applications.filemanager.filemanager_list', compact('title', 'description'));
    }

    /**
     * Display filemanager list of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function shared()
    {
        $title = "Shared Files";
        $description = "View Shared Files";
        return view('pages.applications.filemanager.shared', compact('title', 'description'));
    }

    /**
     * Display filemanager list of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function public ()
    {
        $title = "Public Files";
        $description = "View Public Files";
        return view('pages.applications.filemanager.public', compact('title', 'description'));
    }
}
