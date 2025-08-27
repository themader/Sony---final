

<x-layout>

    <x-slot:title> Novedades </x-slot:title>
        @if (session()->has('feedback.message'))

                <div class="alert alert-success">
                    {!! session()->get('feedback.message') !!}
                </div>

            @endif

    

        <section id="about" >
            <h1 class="mb-3">Nuestras ultimas novedades</h1>



        @foreach ($blogs as $b)

            <article class="about_article">
                <div class="about_img">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($b->cover) }}" class="card-img-top" alt="...">
                </div>
                <div class="promo_text">
                    <h2>{{ $b->titulo}}</h2>
                    <p>{{ $b->texto}}</p>
                </div>
                
            </article>
            
            <hr>

        @endforeach




           


           
        </section>

</x-layout>
