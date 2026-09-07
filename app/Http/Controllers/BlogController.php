<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
    
        $search = $request->input('search');

      
        $blogs = Blog::latest()
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->paginate(10)
            ->withQueryString();

        return view('blog', compact('blogs'));
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

    // ฟังก์ชันสำหรับลบบทความ
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->back()->with('success', 'ลบบทความเรียบร้อยแล้ว');
    }

    // ฟังก์ชันสลับสถานะบทความ (เผยแพร่ / ฉบับร่าง)
    public function changeStatus($id)
    {
        $blog = Blog::findOrFail($id);
        
        // สลับสถานะ (รองรับทั้ง boolean 1/0 หรือ string 'published'/'draft')
        if ($blog->status == '1' || $blog->status === 'published' || $blog->status === true) {
            $blog->status = is_numeric($blog->status) ? 0 : 'draft';
        } else {
            $blog->status = is_numeric($blog->status) ? 1 : 'published';
        }
        $blog->save();

        return redirect()->back()->with('success', 'เปลี่ยนสถานะบทความเรียบร้อยแล้ว');
    }
}