<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard() {
        return view('app.dashboard');
    }

    public function links() {
        $links = Link::orderBy('type')
            ->orderBy('order')
            ->get();
        return view('app.admin.links', compact('links'));
    }

    public function postLinks(Request $request) {
        $links = array_values($request->input('data'));
        foreach ($links as $key => $link) {
            $data = Link::find($link['id']);
            if ($data) {
                $data->open_new_tab = isset($link['open_new_tab']) && $link['open_new_tab'] == 'on';
                $data->type = $link['type'];
                $data->name = $link['name'];
                $data->url = $link['url'];
                $data->order = $key;
                $data->save();
            }
        }
        return redirect()
            ->route('admin.links')
            ->with([
                'success' => 'Saved successfully.'
            ]);
    }

    public function deleteLink($id) {
        $link = Link::find($id);
        if ($link) {
            $link->delete();
            return redirect()
                ->route('admin.links')
                ->with([
                    'success' => 'Deleted successfully.'
                ]);
        }
        return redirect()
            ->route('admin.links')
            ->with([
                'error' => 'Data not found.'
            ]);
    }

    public function addLink() {
        return view('app.admin.links_create');
    }

    public function createLink(Request $request) {
        $link = new Link();
        $link->name = $request->input('name');
        $link->url = $request->input('url');
        $link->type = $request->input('type');
        $link->open_new_tab = $request->input('open_new_tab') !== null && $request->input('open_new_tab') == 'on';
        $link->order = (Link::max('order') ?? 0) + 1;
        $link->save();

        return redirect()
            ->route('admin.create-links')
            ->with([
                'success' => 'Data created successfully.'
            ]);
    }

}
