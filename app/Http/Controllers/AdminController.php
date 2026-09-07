<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $blogs = Blog::when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->orderBy('id', 'asc')
            ->paginate(5)
            ->withQueryString();

        return view('blog', compact('blogs'));
    }

    public function blog2(Request $request)
    {
        $blog2 = DB::table('blogs')->orderBy('id', 'asc')->paginate(5);
        $blogs = $blog2;
        return view('blog2', compact('blog2', 'blogs'));
    }

    public function delete($id)
    {
        DB::table('blogs')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'ลบบทความเรียบร้อยแล้ว');
    }

    public function change($id)
    {
        $blog = DB::table("blogs")->where('id', $id)->first();
        if ($blog->status == 1 || $blog->status == '1' || $blog->status == 'published') {
            $data = ['status' => 0];
        } else {
            $data = ['status' => 1];
        }
        DB::table("blogs")->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'เปลี่ยนสถานะเรียบร้อยแล้ว');
    }

    public function changeStatus($id)
    {
        return $this->change($id);
    }

    public function edit($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        return view('edit', compact('blog'));
    }

    public function update(Request $request, $id)
{
    $data = $request->validate([
        'title'   => 'required|string|max:150',
        'content' => 'required|string|min:10',
    ], [
        'title.required'   => 'กรุณากรอกชื่อบทความ',
        'content.required' => 'กรุณากรอกเนื้อหา',
        'content.min'      => 'เนื้อหาต้องมีอย่างน้อย 10 ตัวอักษร',
    ]);

    DB::table('blogs')->where('id', $id)->update($data);

    return redirect()->route('blog')->with('success', 'แก้ไขบทความเรียบร้อยแล้ว');
}

    public function create()
    {
        return view('from');
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:150',
            'content' => 'required|string|min:10',
        ], [
            'title.required'   => 'กรุณากรอกชื่อบทความ',
            'content.required' => 'กรุณากรอกเนื้อหา',
            'content.min'      => 'เนื้อหาต้องมีอย่างน้อย 10 ตัวอักษร',
        ]);

        Blog::create([
            'title'   => $validated['title'],
            'content' => $validated['content'],
            'status'  => 'draft',
        ]);

        return redirect()->route('from')->with('success', 'บันทึกบทความเรียบร้อยแล้ว');
    }
    

}