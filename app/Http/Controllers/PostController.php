<?php
// 컨트롤러 설정전 모델과 데이터베이스 를 만들어야함
/*
    터미널에서 기본적으로 php artisan make:model 만들고 싶은 명 -m
    -m은 옵션의 의미 : 모델과 함께 데이터베이스 테이블을 정의하는 마이그레이션 파일
    도 함께 만들어 달라는 뜻
    마이그레이션에도 만들어지고 마이그레이션에 내가 만들고 싶은 테이블 형태를 up함수에 지정
*/

namespace App\Http\Controllers;

use App\Models\Post; // 모델 사용 선언
use Illuminate\Http\Request; // 사용자 요청 처리 클래스 선언

class PostController extends Controller // 컨트롤러를 상속받아야 laravel의 기본기능 미들웨어 처리, 응답처리등을 사용할 수 있음
{
    // 1. 전체 게시글 목록 보기
    public function index(){
        $posts = Post::orderBy('created_at' , 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // 2. 글 작성 폼 보기
    public function create(){
        return view('posts.create');
    }

    // 3. 데이터베이스에 새 글 저장
    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'nullable|max:50',
        ]);

        Post::create($validated);
        return redirect()->route('posts.index')->with("success" ,'새글이 성공적으로 작성');
    }

    //4. 특정 게시글 보기
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    //5. 글 수정 폼 보기
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    //6. 게시글 수정 내용 저장
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'nullable|max:50',
        ]);

        $post->update($validated);
        return redirect()->route('posts.show', $post)->with('success', '글이 성공적으로 작성');
    }

    //7. 게시글 삭제
    public function destroy(post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', '글이 성공적으로 삭제');
    }
}
