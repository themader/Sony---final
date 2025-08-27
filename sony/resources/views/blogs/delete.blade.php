<x-layout>

    <x-slot:title>Detalle del {{ $blog->titulo }}</x-slot:title>

    <h1 class="mb-3">confirmacion para eliminar {{ $blog->titulo }}</h1>
    <h3>Atencion estas a punto de eliminar el la publicacion {{ $blog->titulo }}</h3>

    <section id="producto_seleccionado">
        <article class="producto_seleccionado_article">
            <div>
                <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->cover) }}" class="img_create">
            </div>
            <div>
                <h1 class="mb-3"><strong>{{ $blog->titulo }}</strong></h1>
                <h3>{{ $blog->texto }}</h3>



                <form action="{{ route('blog.destroy', ['id' => $blog->id]) }}" method="post" class="mb-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar la publicacion</button>

                </form>
                
            </div>
        </article>
        <br>
        <article class="descripcion">
            <h3><Strong>Descripcion de {{ $blog->titulo }}</Strong></h3>
            <h4>{{ $blog->texto }}</h4>
        </article>
    </section>


    

</x-layout>
