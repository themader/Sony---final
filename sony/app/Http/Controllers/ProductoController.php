<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
{
    protected $validationRules = [
        'nombre' => 'required|min:2',
        'cover' => 'required',
        'empresa' => 'required|min:2',
        'price' => 'required|numeric',
        'date_lanzamiento' => 'required|date',
        'description' => 'required|min:5',
    ];

    protected $validationMessages = [
        'nombre.required' => 'El nombre debe tener un valor',
        'nombre.min' => 'El nombre debe tener al menos :min caracteres',
        'cover.required' => 'Debe cargar una img',
        'empresa.required' => 'La empresa debe tener un valor',
        'empresa.min' => 'La empresa debe tener al menos :min caracteres',
        'price.required' => 'El precio debe tener un valor',
        'price.numeric' => 'El precio debe ser un valor numérico',
        'date_lanzamiento.required' => 'La fecha debe tener un valor',
        'date_lanzamiento.date' => 'La fecha debe ser una fecha válida',
        'description.required' => 'La descripción es obligatoria',
        'description.min' => 'La descripción debe tener al menos :min caracteres',
    ];

    public function index(Request $request)
    {
        $query = Producto::query();

        if ($request->filled('s-nombre')) {
            $query->where('nombre', 'like', '%' . $request->input('s-nombre') . '%');
        }

        if ($request->filled('s-categoria')) {
            $query->whereHas('categorias', function ($q) use ($request) {
                $q->where('categoria_id', $request->input('s-categoria'));
            });
        }

        $productos = $query->paginate(12)->withQueryString();

        return view('productos.index', [
            'productos' => $productos,
            'categorias' => Categoria::orderBy('name')->get(),
            'searchParams' => [
                's-nombre' => $request->input('s-nombre'),
                's-categoria' => $request->input('s-categoria')
            ]
        ]);
    }



    public function view(int $id)
    {
        return view('productos.view', [
            'producto' => Producto::findOrFail($id)
        ]);
    }



    public function create(Request $request)
    {
        $query = Producto::query();

        if ($request->filled('s-nombre')) {
            $query->where('nombre', 'like', '%' . $request->input('s-nombre') . '%');
        }

        if ($request->filled('s-categoria')) {
            $query->whereHas('categorias', function ($q) use ($request) {
                $q->where('categoria_id', $request->input('s-categoria'));
            });
        }

      
        $productos = $query->paginate(5)->withQueryString();

        return view('productos.create', [
            'productos' => $productos,
            'categorias' => Categoria::orderBy('name')->get(),
            'searchParams' => [
                's-nombre' => $request->input('s-nombre'),
                's-categoria' => $request->input('s-categoria')
            ]
        ]);
    }


    public function store(Request $request)
    {
        $request->validate($this->validationRules, $this->validationMessages);

        $input = $request->all();

        if ($request->hasFile('cover')) {
            $input['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $producto = Producto::create($input);

        $producto->categorias()->attach($request->input('categoria_id', []));

        return redirect()
            ->route('producto.index')
            ->with('feedback.message', 'El producto <b>' . e($producto->nombre) . '</b> se publicó exitosamente');
    }

    public function delete(int $id)
    {
        return view('productos.delete', [
            'producto' => Producto::findOrFail($id)
        ]);
    }

    public function destroy(int $id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->cover) {
            Storage::disk('public')->delete($producto->cover);
        }

        $producto->categorias()->detach();

        $producto->delete();

        return redirect()->route('producto.create')
            ->with('feedback.message', 'El producto <b>' . e($producto->nombre) . '</b> se eliminó exitosamente');
    }

   public function edit(int $id)
    {
        $producto = Producto::findOrFail($id);

        return view('productos.edit', [
            'producto' => $producto,
            'categorias' => Categoria::orderBy('name')->get(),
            'selectedCategorias' => $producto->categorias->pluck('categoria_id')->toArray()
        ]);
    }


   public function update(Request $request, int $id)
        {
        $request->validate([
            'nombre' => 'required|min:2',
            'empresa' => 'required|min:2',
            'price' => 'required|numeric',
            'date_lanzamiento' => 'required|date',
            'description' => 'required|min:5',
        ], [
            'nombre.required' => 'El nombre debe tener un valor',
            'nombre.min' => 'El nombre debe tener al menos :min caracteres',

            'empresa.required' => 'La empresa debe tener un valor',
            'empresa.min' => 'La empresa debe tener al menos :min caracteres',

            'price.required' => 'El precio debe tener un valor',
            'price.numeric' => 'El precio debe ser un valor numérico',

            'date_lanzamiento.required' => 'La fecha de lanzamiento es obligatoria',
            'date_lanzamiento.date' => 'La fecha de lanzamiento debe ser una fecha válida',

            'description.required' => 'Se requiere una descripción',
            'description.min' => 'La descripción debe tener al menos :min caracteres',
        ]);


        $producto = Producto::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('cover')) {
            $oldCover = $producto->cover;
            $input['cover'] = $request->file('cover')->store('covers', 'public');

            if ($oldCover) {
                Storage::disk('public')->delete($oldCover);
            }
        }

        $producto->update($input);
        $producto->categorias()->sync($request->input('categoria_id', []));

        return redirect()->route('producto.create')
            ->with('feedback.message', 'El producto <b>' . e($request->nombre) . '</b> se modificó exitosamente');
    }


}
