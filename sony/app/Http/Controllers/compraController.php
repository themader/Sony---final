<?php

namespace App\Http\Controllers;

use App\Models\UserSony;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class compraController extends Controller
{
  
    
    public function agregarAlCarrito(Producto $producto)
    {
        $user = Auth::user();

        if (!$user->carrito()->where('producto_id', $producto->id)->exists()) {
            $user->carrito()->attach($producto->id);
        }

        return back()->with('feedback.message', 'Producto agregado al carrito');
    }

    public function eliminarDelCarrito(Producto $producto)
    {
        $user = Auth::user();
        $user->carrito()->detach($producto->id);

        return back()->with('feedback.message', 'Producto eliminado del carrito');
    }

    public function verCarrito()
    {
        $user = Auth::user();
        $productos = $user->carrito;
        $total = $productos->sum('price');

        return view('carrito.index', compact('productos', 'total'));
    }





    public function compraCarrito()
    {
        $user = Auth::user();
        $productos = $user->carrito;

        if ($productos->isEmpty()) {
            return back()->with('feedback.message', 'Tu carrito está vacío.');
        }

        DB::beginTransaction();

        try {
            
            $venta = new Venta();
            $venta->user_id = $user->id;
            $venta->save();

            foreach ($productos as $producto) {
                DB::table('venta_have_producto')->insert([
                    'id_venta' => $venta->id,
                    'producto_id' => $producto->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $user->carrito()->detach();

            DB::commit();
            return redirect()->route('producto.index')->with('feedback.message', 'Compra realizada con éxito');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('feedback.message', 'Ocurrió un error al procesar la compra: ' . $e->getMessage());
        }
    }
    


     
        public function index(Request $request)
        {
            $query = Venta::with(['user', 'productos.categorias'])
                        ->orderByDesc('created_at');

            if (auth()->user()->role === 'Cliente') {
                $query->where('user_id', auth()->id());
            }

           if ($request->filled('s-created_at')) {
                $query->whereDate('created_at', $request->input('s-created_at'));
            }

            $ventas = $query->paginate(8)->withQueryString();

            return view('Venta.index', compact('ventas'));
        }


}
