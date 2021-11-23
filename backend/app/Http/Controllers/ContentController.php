<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function input()
    {
        $contents_get_query = Content::select('*')->orderByDesc('id');
        $items = $contents_get_query->simplePaginate(5);

        return view('contents.input', [
            'items' => $items,
        ]);
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:2000',
        ]);

        $input_content = new Content();
        $input_content->content = $request['content'];
        $input_content->user_id = $request->user()->id;
        $input_content->save();

        return redirect('/');

    }
}
