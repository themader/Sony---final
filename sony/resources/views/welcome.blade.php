<x-layout>

    <x-slot:title> Inicio </x-slot:title>


    <section id="img_inicio">
        <article class="inicio_1">
            <h4>Serie 1000X</h4>
            <h3>WH-1000XM6 x</h3>
            <h3>Post Malone</h3>
          
           <a class="btn btn-info" href="{{ route('producto.index') }}">Tienda</a>
        </article>
    </section>
           
    <section id="carousel">
        <h2>Lo mas reciente</h2>

        <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{ route('novedades') }}"><img src="/img/gta6.png" class="d-block w-100" alt="..."></a>
                    
                    <div class="carousel-caption d-none d-md-block">
                        <h5>ACUERDO HISTORICO</h5>
                        <p>Sony y Rcokstar Games llegan a un acuerdo historico en la industria de los videojuegos.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('producto.index') }}"><img src="/img/linkbuds.png" class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Serie LinkBuds</h5>
                        <p>Conecta todos los mundos.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="/img/ps6.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Inicio de desarrollo PlayStation 6</h5>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </section>
            


        <section id="promos" >
        <h2>Ofertas y novedades</h2>
            <article class="promos_article">
                <div class="promo_image">
                    <img src="img/promo1.webp"  alt="habilidades de camaras">

                </div>
                <div class="promo_text">
                    <h2>Alpha Universe</h2>
                    <p>Mejorá tus habilidades en el mundo de la fotografía y el video, con nuestros seminarios, charlas y talleres 100% gratuitos</p>
                </div>
                
            </article>

            <br>


             <article class="promos_article">
                
                <div class="promo_image">
                    <img src="img/promo2.webp"  alt="productos">
                </div>

                <div class="promo_text">
                    <h2>Obten tu nuevo producto y obten beneficios exclusivos</h2>
                    <p>Adquiere productos para obtener beneficios</p>
                    
                </div>
            </article>



            <br>


             <article class="promos_article">
                
                <div class="promo_image">
                    <img src="img/promo3.webp"  alt="plataformas de entreenimiento">
                </div>

                <div class="promo_text">
                    <p>Deportes, peliculas, series y mas</p>
                    <h2>Conoce las aplicaciones disponibles dentro de nuestros dispositivos</h2>
                    
                </div>
            </article>

            <br>

            <article class="promos_article">
                
                <div class="promo_image">
                    <img src="img/promo4.webp"  alt="camara">
                </div>

                <div class="promo_text">
                    <p>¿Quieres conocer todos los beneficios?</p>
                    <h2>Obten este paquete GRATIS por la compra de nuestros equipos</h2>
                    <p>ponte en contacto con nosotros en: consultas.sony@sony.com.ar</p>
                    <p>obten 1 año de garantia</p>
                    
                </div>
            </article>
        </section>
</x-layout>
