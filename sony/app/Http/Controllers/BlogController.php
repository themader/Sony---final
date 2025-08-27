<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    protected $validationRules = [
        'cover'      => 'required|image',
        'titulo'     => 'required|min:5',
        'texto'      => 'required|min:10',
    ];

    protected $validationMessages = [
        'cover.required'   => 'Debe cargar una imagen',
        'cover.image'      => 'El archivo debe ser una imagen válida',
        'titulo.required'  => 'Debe ingresar un título para la publicación',
        'titulo.min'       => 'El título debe contener al menos 5 letras',
        'texto.required'   => 'Debe ingresar el contenido',
        'texto.min'        => 'El texto debe tener al menos 10 caracteres',
    ];

    public function index()
    {
        $blogs = Blog::all();

        return view('blogs.index', [
            'blogs' => $blogs
        ]);
    }

 

    public function create()
    {
        $blogs = \App\Models\Blog::all(); 

        return view('blogs.create', [
            'blogs' => $blogs, 
        ]);
    }


    public function store(Request $request)
    {
        $request->validate($this->validationRules, $this->validationMessages);

        $input = $request->all();

        if ($request->hasFile('cover')) {
            $input['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $blog = Blog::create($input);

        return redirect()->route('blog.index')
            ->with('feedback.message', 'La publicación <b>' . e($blog->titulo) . '</b> se creó exitosamente');
    }

    public function delete(int $id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.delete', [
            'blog' => $blog
        ]);
    }

    public function destroy(int $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->cover) {
            Storage::disk('public')->delete($blog->cover);
        }

        $blog->delete();

        return redirect()->route('blog.index')
            ->with('feedback.message', 'La publicación <b>' . e($blog->titulo) . '</b> se eliminó exitosamente');
    }

    public function edit(int $id)
    {
        return view('blogs.edit', [
            'blog' => Blog::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id)
    {
       $request->validate([
            'titulo' => 'required|min:2',
            'texto' => 'required|min:10',
        ], [
            'titulo.required' => 'Debe ingresar un titulo a la publicacion',
            'titulo.min' => 'El titulo debe tener al menos :min caracteres',

            'texto.required' => 'Debe ingresar contenido a la publicacion',
            'texto.min' => 'Debe tener al menos :min caracteres',

            
        ]);

        $blog = Blog::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('cover')) {
            $oldCover = $blog->cover;
            $input['cover'] = $request->file('cover')->store('covers', 'public');

            if ($oldCover) {
                Storage::disk('public')->delete($oldCover);
            }
        }

        $blog->update($input);

        return redirect()->route('blog.index')
            ->with('feedback.message', 'La publicación <b>' . e($blog->titulo) . '</b> se actualizó correctamente');
    }
}
