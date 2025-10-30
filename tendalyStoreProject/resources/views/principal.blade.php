<<<<<<< HEAD:tendalystore_/index.html
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catálogo de Econegocios y Bionegocios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <div class="grid-container">
      <header
        class="header-top fixed top-0 left-0 right-0 bg-white shadow-md p-4 flex items-center justify-between z-50"
      >
        <a
          href="#"
          class="mx-auto md:mx-0 text-xl font-bold text-red-600 flex items-center justify-center w-full md:w-auto"
        >
          <img src="assets/logo.svg" alt="" width="100px" />
        </a>
        <div class="hidden md:flex flex-1 mx-8 max-w-lg">
          <input
            type="search"
            placeholder="Buscar productos..."
            class="w-full p-2 border-2 border-gray-300 rounded-l-lg focus:outline-none focus:border-[var(--color-primary)] transition"
          />
          <button
            class="bg-[var(--color-primary)] text-white p-2 rounded-r-lg hover:bg-[#a93226] transition"
          >
            <i class="bi bi-search"></i>
          </button>
        </div>
        <nav class="hidden md:flex">
          <div class="items-center space-x-4 flex">
            <button
              class="flex items-center space-x-2 text-[var(--color-primary)] hover:text-[var(--color-secondary)] transition"
            >
              <i class="bi bi-person text-2xl"></i>
              <span class="text-sm"></span>
            </button>
            <button
              class="relative text-[var(--color-primary)] hover:text-[var(--color-secondary)] transition"
            >
              <i class="bi bi-cart text-2xl"></i>
            </button>
            <button
              class="text-[var(--color-primary)] hover:text-[var(--color-secondary)] transition"
            >
              <i class="bi bi-list text-2xl"></i>
            </button>
          </div>
        </nav>
      </header>
      <div
        class="md:hidden fixed bottom-0 left-0 right-0 bg-[var(--color-primary)] z-40 shadow-lg"
      >
        <div class="flex items-center justify-between px-4 py-4">
          <button>
            <i class="bi bi-search text-2xl text-white"></i>
          </button>
          <button>
            <i class="bi bi-person text-2xl text-white"></i>
          </button>
          <button>
            <i class="bi bi-cart text-2xl text-white"></i>
          </button>
          <button>
            <i class="bi bi-list text-2xl text-white"></i>
          </button>
        </div>
      </div>
      <section
        id="hero"
        class="hero-section relative h-96 md:h-[500px] flex items-center justify-center text-center bg-cover bg-center"
        style="
          background-image: url('assets/fondo_evea-1024x682.jpg');
          background-color: rgba(88, 130, 182, 0.863);
          background-blend-mode: multiply;
        "
      >
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 p-4 md:p-8">
          <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6">
            Catálogo de <br class="md:hidden" />
            <span class="text-[var(--color-accent)]">Econegocios</span> y
            <span class="text-[var(--color-accent)]">Bionegocios</span>
          </h1>
          <p class="text-lg text-white mb-8 max-w-xl mx-auto hidden md:block">
            Descubre productos sostenibles, conecta con emprendedores verdes y
            forma parte del ecosistema de economía circular más grande del Perú
          </p>
          <div
            class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 justify-center"
          >
            <a
              href="#catalog"
              class="btn-primary text-white font-bold py-3 px-8 rounded-full shadow-lg text-center transition"
            >
              Explorar Catálogo
            </a>
            <a
              href="#eco-business"
              class="btn-secondary font-bold py-3 px-8 rounded-full shadow-lg text-center transition"
            >
              Registrar mi tienda
            </a>
          </div>
        </div>
      </section>
      <section id="catalog" class="catalog-section p-8 md:p-12">
        <div class="content-wrapper">
          <h2
            class="text-3xl md:text-4xl font-bold text-center mb-10 text-[var(--color-primary)]"
          >
            Productos Destacados del Catálogo
          </h2>
          <p class="text-center text-gray-700 mb-12 max-w-2xl mx-auto">
            Descubre una amplia variedad de productos y servicios sostenibles
            que contribuyen al desarrollo de una economía más verde y
            responsable en el Perú.
          </p>
          <div
            class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-6"
          >
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--color-secondary)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="assets/alimentacion.jpg"
                alt="Alimentación"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--color-primary)] line-clamp-2"
                >
                  Alimentación
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Productos orgánicos, superalimentos y alternativas sostenibles
                  para una alimentación saludable.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--color-primary)] py-2 rounded-full hover:bg-[#a93226] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--color-secondary)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="assets/cosmetica.jpg"
                alt="Cosmética y Bienestar"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--color-primary)] line-clamp-2"
                >
                  Cosmética y Bienestar
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Productos naturales para el cuidado personal, libres de
                  tóxicos y respetuosos con el medio ambiente.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--color-primary)] py-2 rounded-full hover:bg-[#a93226] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--color-secondary)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80"
                alt="Ecoturismo"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--color-primary)] line-clamp-2"
                >
                  Ecoturismo
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Experiencias y viajes responsables que promueven la
                  conservación y el desarrollo local.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--color-primary)] py-2 rounded-full hover:bg-[#a93226] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--color-secondary)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="assets/eficiencia.jpg"
                alt="Eficiencia de Recursos"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--color-primary)] line-clamp-2"
                >
                  Eficiencia de Recursos
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Soluciones para el ahorro de energía, agua y materiales en
                  hogares y empresas.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--color-primary)] py-2 rounded-full hover:bg-[#a93226] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--color-secondary)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="assets/moda.jpg"
                alt="Moda Sostenible"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--color-primary)] line-clamp-2"
                >
                  Moda Sostenible
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Prendas y accesorios elaborados con materiales ecológicos y
                  procesos éticos.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--color-primary)] py-2 rounded-full hover:bg-[#a93226] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
      <section
        id="eco-business"
        class="eco-business-section py-0 md:py-0 px-0 text-center"
      >
        <div
          class="relative bg-cover bg-center"
          style="
            background-image: url('assets/negociossec.jpeg');
            background-color: rgba(19, 70, 134, 0.75);
            background-blend-mode: multiply;
          "
        >
          <div class="p-8 md:p-12 relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">
              ¿Tienes un Econegocio o Bionegocio?
            </h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
              Únete a nuestra plataforma y haz visible tu emprendimiento
              sostenible. Conecta con clientes que buscan productos y servicios
              responsables con el medio ambiente.
            </p>
            <div
              class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 justify-center"
            >
              <button
                class="btn-secondary font-bold py-3 px-8 rounded-full shadow-lg transform transition-transform duration-200 hover:scale-105"
              >
                Registrar mi tienda
              </button>
              <button
                class="btn-primary text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition-transform duration-200 hover:scale-105"
              >
                Conocer Beneficios
              </button>
            </div>
          </div>
        </div>
      </section>
      <section id="about" class="about-section p-8 md:p-12">
        <div class="content-wrapper">
          <h2
            class="text-3xl md:text-4xl font-bold text-center mb-12 text-[var(--color-primary)]"
          >
            ¿Quiénes Somos?
          </h2>
          <div
            class="about-content flex flex-col lg:flex-row lg:items-center lg:gap-12"
          >
            <div class="flex-1">
              <p class="text-gray-700 mb-6 leading-relaxed">
                El Portal Informativo de Econegocios y Bionegocios está a cargo
                de la Dirección General de Economía y Financiamiento Ambiental
                (DGEFA) del Viceministerio de Desarrollo Estratégico de los
                Recursos Naturales (VMDERN) del Ministerio del Ambiente (MINAM).
                La DGEFA es el órgano de línea responsable, entre otras
                funciones, de promover los econegocios y bionegocios, con la
                participación del sector privado, dentro del ámbito de su
                competencia y en coordinación con las entidades competentes.
              </p>
              <p class="text-gray-700 mb-6 leading-relaxed">
                Por ello, la DGEFA ha desarrollado e implementado el Portal
                Informativo de Econegocios y Bionegocios, en donde se ubican sus
                herramientas de promoción a los econegocios y bionegocios, y se
                publica material adicional que consideramos relevante para
                comprender y apoyar al ecosistema del emprendimiento sostenible
                en el Perú.
              </p>
              <ul class="space-y-3 mb-6">
                <li class="flex items-start">
                  <i
                    class="bi bi-patch-check-fill text-xl text-[var(--color-secondary)] mr-3 mt-1"
                  ></i>
                  <span>Productos con certificación de impacto positivo.</span>
                </li>
                <li class="flex items-start">
                  <i
                    class="bi bi-currency-dollar text-xl text-[var(--color-secondary)] mr-3 mt-1"
                  ></i>
                  <span>Precios justos para productores y consumidores.</span>
                </li>
                <li class="flex items-start">
                  <i
                    class="bi bi-leaf-fill text-xl text-[var(--color-secondary)] mr-3 mt-1"
                  ></i>
                  <span
                    >Compromiso con la biodiversidad y el medio ambiente.</span
                  >
                </li>
              </ul>
            </div>
            <div class="flex-1 flex justify-center items-center mt-8 lg:mt-0">
              <img
                src="assets/about.jpg"
                alt="Imagen de referencia"
                class="w-full max-w-lg h-auto object-contain rounded-2xl shadow-2xl transition-all duration-300"
              />
            </div>
          </div>
        </div>
      </section>
      <section id="news" class="news-section p-8 md:p-12">
        <div class="content-wrapper">
          <h2
            class="text-3xl md:text-4xl font-bold text-center mb-12 text-[var(--color-primary)]"
          >
            Noticias y Eventos
          </h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div
              class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                alt="Noticia 1"
                class="w-full h-48 object-cover"
              />
              <div class="p-6 flex flex-col flex-1">
                <span class="text-xs font-semibold text-gray-500 mb-2 block"
                  >10 SEP 2025</span
                >
                <h3 class="text-xl font-bold mb-2 text-[var(--color-primary)]">
                  Guía para implementar el empaque zero-waste en tu negocio
                </h3>
                <p class="text-gray-700 mb-4 flex-1">
                  Descubre los pasos clave para reducir residuos y adoptar
                  empaques sostenibles en tu emprendimiento.
                </p>
                <a
                  href="#"
                  class="inline-block text-sm font-semibold text-white bg-[var(--color-primary)] px-5 py-2 rounded-full hover:bg-[var(--color-secondary)] transition text-center"
                >
                  Leer más <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div
              class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80"
                alt="Noticia 2"
                class="w-full h-48 object-cover"
              />
              <div class="p-6 flex flex-col flex-1">
                <span class="text-xs font-semibold text-gray-500 mb-2 block"
                  >28 AGO 2025</span
                >
                <h3 class="text-xl font-bold mb-2 text-[var(--color-primary)]">
                  Innovación en bioplásticos a partir de residuos orgánicos
                </h3>
                <p class="text-gray-700 mb-4 flex-1">
                  Nuevas tecnologías permiten crear bioplásticos biodegradables,
                  impulsando la economía circular.
                </p>
                <a
                  href="#"
                  class="inline-block text-sm font-semibold text-white bg-[var(--color-primary)] px-5 py-2 rounded-full hover:bg-[var(--color-secondary)] transition text-center"
                >
                  Leer más <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div
              class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=600&q=80"
                alt="Noticia 3"
                class="w-full h-48 object-cover"
              />
              <div class="p-6 flex flex-col flex-1">
                <span class="text-xs font-semibold text-gray-500 mb-2 block"
                  >15 JUL 2025</span
                >
                <h3 class="text-xl font-bold mb-2 text-[var(--color-primary)]">
                  Entrevista: El futuro del comercio sostenible
                </h3>
                <p class="text-gray-700 mb-4 flex-1">
                  Expertos analizan las tendencias y oportunidades para negocios
                  responsables en Latinoamérica.
                </p>
                <a
                  href="#"
                  class="inline-block text-sm font-semibold text-white bg-[var(--color-primary)] px-5 py-2 rounded-full hover:bg-[var(--color-secondary)] transition text-center"
                >
                  Leer más <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer
        id="contact"
        class="footer-section pt-12 pb-24 md:pb-12 px-4 bg-[var(--color-primary)] text-white"
      >
        <div class="content-wrapper max-w-6xl mx-auto">
          <div
            class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10 border-b border-white border-opacity-20 pb-8"
          >
            <div>
              <h4 class="font-bold text-2xl mb-4 text-[var(--color-accent)]">
                Contáctanos
              </h4>
              <p class="mb-2">
                <i
                  class="bi bi-geo-alt-fill mr-2 text-[var(--color-accent)]"
                ></i>
                Av. Antonio Miroquesada (ex Juan de Aliaga) 425 - 4° piso,
                urbanización San Felipe - Magdalena del Mar - Lima
              </p>
              <p class="mb-2">
                <i
                  class="bi bi-telephone-fill mr-2 text-[var(--color-accent)]"
                ></i>
                (+511) 611 6000
              </p>
              <p class="mb-4 break-all">
                <i
                  class="bi bi-envelope-fill mr-2 text-[var(--color-accent)]"
                ></i>
                bioyeconegocios@minam.gob.pe
              </p>
              <div class="flex space-x-4 text-2xl mt-4">
                <a href="#" class="hover:text-[var(--color-accent)] transition"
                  ><i class="bi bi-facebook"></i
                ></a>
                <a href="#" class="hover:text-[var(--color-accent)] transition"
                  ><i class="bi bi-instagram"></i
                ></a>
                <a href="#" class="hover:text-[var(--color-accent)] transition"
                  ><i class="bi bi-linkedin"></i
                ></a>
                <a href="#" class="hover:text-[var(--color-accent)] transition"
                  ><i class="bi bi-youtube"></i
                ></a>
              </div>
            </div>
            <div>
              <h4 class="font-bold text-2xl mb-4 text-[var(--color-accent)]">
                Déjanos un mensaje
              </h4>
              <form>
                <input
                  type="text"
                  placeholder="Nombre y Apellido"
                  class="w-full p-3 mb-3 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)]"
                  required
                />
                <input
                  type="email"
                  placeholder="Correo electrónico"
                  class="w-full p-3 mb-3 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)]"
                  required
                />
                <input
                  type="text"
                  placeholder="Asunto"
                  class="w-full p-3 mb-3 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)]"
                  required
                />
                <textarea
                  placeholder="Mensaje"
                  rows="4"
                  class="w-full p-3 mb-3 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-[var(--color-accent)] resize-none"
                  required
                ></textarea>
                <button
                  type="submit"
                  class="w-full font-bold py-3 px-4 rounded-lg bg-[var(--color-accent)] text-[var(--color-primary)] hover:bg-yellow-400 transition"
                >
                  Enviar
                </button>
              </form>
            </div>
          </div>
          <div class="text-center text-sm text-gray-300 mt-8">
            &copy; 2025 tendalyStore. Todos los derechos reservados.
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
=======
@extends('layouts.app')
@section('titulo')
  Bienvenido
@endsection

@section('contenido')
      <div
        class="md:hidden fixed bottom-0 left-0 right-0 bg-[var(--primary-blue)] z-40 shadow-lg"
      >
        <div class="flex items-center justify-between px-4 py-4">
          <button>
            <i class="bi bi-search text-2xl text-white"></i>
          </button>
          <button>
            <i class="bi bi-person text-2xl text-white"></i>
          </button>
          <button>
            <i class="bi bi-cart text-2xl text-white"></i>
          </button>
          <button>
            <i class="bi bi-list text-2xl text-white"></i>
          </button>
        </div>
      </div>
      <section
        id="hero"
        class="hero-section relative h-96 md:h-[500px] flex items-center justify-center text-center bg-cover bg-center"
        style="
          background-image: url('{{asset('assets/images/fondo_evea-1024x682.jpg')}}');
          background-color: rgba(88, 130, 182, 0.863);
          background-blend-mode: multiply;
        "
      >
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 p-4 md:p-8">
          <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6">
            Catálogo de <br class="md:hidden" />
            <span class="text-[var(--accent-yellow)]">Econegocios</span> y
            <span class="text-[var(--accent-yellow)]">Bionegocios</span>
          </h1>
          <p class="text-lg text-white mb-8 max-w-xl mx-auto hidden md:block">
            Descubre productos sostenibles, conecta con emprendedores verdes y
            forma parte del ecosistema de economía circular más grande del Perú
          </p>
          <div
            class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 justify-center"
          >
            <a
              href="/catalogo"
              class="btn-primary text-white font-bold py-3 px-8 rounded-full shadow-lg text-center transition"
            >
              Explorar Catálogo
            </a>
            <a
              href="#eco-business"
              class="btn-secondary font-bold py-3 px-8 rounded-full shadow-lg text-center transition"
            >
              Registrar mi tienda
            </a>
          </div>
        </div>
      </section>
      <section id="catalog" class="catalog-section p-8 md:p-12">
        <div class="content-wrapper">
          <h2
            class="text-3xl md:text-4xl font-bold text-center mb-10 text-[var(--primary-blue)]"
          >
            Productos Destacados del Catálogo
          </h2>
          <p class="text-center text-gray-700 mb-12 max-w-2xl mx-auto">
            Descubre una amplia variedad de productos y servicios sostenibles
            que contribuyen al desarrollo de una economía más verde y
            responsable en el Perú.
          </p>
          <div
            class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-6"
          >
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--secondary-red)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="{{asset('assets/images/alimentacion.jpg')}}"
                alt="Alimentación"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--primary-blue)] line-clamp-2"
                >
                  Alimentación
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Productos orgánicos, superalimentos y alternativas sostenibles
                  para una alimentación saludable.
                </p>
                <a
                  href="/catalogo"
                  class="block text-center text-xs text-white bg-[var(--primary-blue)] py-2 rounded-full hover:bg-[#10386e] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--secondary-red)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="{{asset('assets/images/cosmetica.jpg')}}"
                alt="Cosmética y Bienestar"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--primary-blue)] line-clamp-2"
                >
                  Cosmética y Bienestar
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Productos naturales para el cuidado personal, libres de
                  tóxicos y respetuosos con el medio ambiente.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--primary-blue)] py-2 rounded-full hover:bg-[#10386e] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--secondary-red)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80"
                alt="Ecoturismo"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--primary-blue)] line-clamp-2"
                >
                  Ecoturismo
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Experiencias y viajes responsables que promueven la
                  conservación y el desarrollo local.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--primary-blue)] py-2 rounded-full hover:bg-[#10386e] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--secondary-red)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="{{asset('assets/images/eficiencia.jpg')}}"
                alt="Eficiencia de Recursos"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--primary-blue)] line-clamp-2"
                >
                  Eficiencia de Recursos
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Soluciones para el ahorro de energía, agua y materiales en
                  hogares y empresas.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--primary-blue)] py-2 rounded-full hover:bg-[#10386e] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
            <div
              class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-[var(--secondary-red)] transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="{{asset('assets/images/moda.jpg')}}"
                alt="Moda Sostenible"
                class="w-full h-28 md:h-36 object-cover"
              />
              <div class="p-3 md:p-4">
                <h3
                  class="font-bold text-sm md:text-md mb-2 text-[var(--primary-blue)] line-clamp-2"
                >
                  Moda Sostenible
                </h3>
                <p class="text-xs text-gray-500 mb-3">
                  Prendas y accesorios elaborados con materiales ecológicos y
                  procesos éticos.
                </p>
                <a
                  href="#"
                  class="block text-center text-xs text-white bg-[var(--primary-blue)] py-2 rounded-full hover:bg-[#10386e] transition"
                  >Visitar el catálogo</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
      <section
        id="eco-business"
        class="eco-business-section py-0 md:py-0 px-0 text-center"
      >
        <div
          class="relative bg-cover bg-center"
          style="
            background-image: url('assets/negociossec.jpeg');
            background-color: rgba(19, 70, 134, 0.75);
            background-blend-mode: multiply;
          "
        >
          <div class="p-8 md:p-12 relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">
              ¿Tienes un Econegocio o Bionegocio?
            </h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
              Únete a nuestra plataforma y haz visible tu emprendimiento
              sostenible. Conecta con clientes que buscan productos y servicios
              responsables con el medio ambiente.
            </p>
            <div
              class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 justify-center"
            >
              <button
                class="btn-secondary font-bold py-3 px-8 rounded-full shadow-lg transform transition-transform duration-200 hover:scale-105"
              >
                Registrar mi tienda
              </button>
              <button
                class="btn-primary text-white font-bold py-3 px-8 rounded-full shadow-lg transform transition-transform duration-200 hover:scale-105"
              >
                Conocer Beneficios
              </button>
            </div>
          </div>
        </div>
      </section>
      <section id="about" class="about-section p-8 md:p-12">
        <div class="content-wrapper">
          <h2
            class="text-3xl md:text-4xl font-bold text-center mb-12 text-[var(--primary-blue)]"
          >
            ¿Quiénes Somos?
          </h2>
          <div
            class="about-content flex flex-col lg:flex-row lg:items-center lg:gap-12"
          >
            <div class="flex-1">
              <p class="text-gray-700 mb-6 leading-relaxed">
                El Portal Informativo de Econegocios y Bionegocios está a cargo
                de la Dirección General de Economía y Financiamiento Ambiental
                (DGEFA) del Viceministerio de Desarrollo Estratégico de los
                Recursos Naturales (VMDERN) del Ministerio del Ambiente (MINAM).
                La DGEFA es el órgano de línea responsable, entre otras
                funciones, de promover los econegocios y bionegocios, con la
                participación del sector privado, dentro del ámbito de su
                competencia y en coordinación con las entidades competentes.
              </p>
              <p class="text-gray-700 mb-6 leading-relaxed">
                Por ello, la DGEFA ha desarrollado e implementado el Portal
                Informativo de Econegocios y Bionegocios, en donde se ubican sus
                herramientas de promoción a los econegocios y bionegocios, y se
                publica material adicional que consideramos relevante para
                comprender y apoyar al ecosistema del emprendimiento sostenible
                en el Perú.
              </p>
              <ul class="space-y-3 mb-6">
                <li class="flex items-start">
                  <i
                    class="bi bi-patch-check-fill text-xl text-[var(--secondary-red)] mr-3 mt-1"
                  ></i>
                  <span>Productos con certificación de impacto positivo.</span>
                </li>
                <li class="flex items-start">
                  <i
                    class="bi bi-currency-dollar text-xl text-[var(--secondary-red)] mr-3 mt-1"
                  ></i>
                  <span>Precios justos para productores y consumidores.</span>
                </li>
                <li class="flex items-start">
                  <i
                    class="bi bi-leaf-fill text-xl text-[var(--secondary-red)] mr-3 mt-1"
                  ></i>
                  <span
                    >Compromiso con la biodiversidad y el medio ambiente.</span
                  >
                </li>
              </ul>
            </div>
            <div class="flex-1 flex justify-center items-center mt-8 lg:mt-0">
              <img
                src="{{asset('assets/images/about.jpg')}}"
                alt="Imagen de referencia"
                class="w-full max-w-lg h-auto object-contain rounded-2xl shadow-2xl transition-all duration-300"
              />
            </div>
          </div>
        </div>
      </section>
      <section id="news" class="news-section p-8 md:p-12">
        <div class="content-wrapper">
          <h2
            class="text-3xl md:text-4xl font-bold text-center mb-12 text-[var(--primary-blue)]"
          >
            Noticias y Eventos
          </h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div
              class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                alt="Noticia 1"
                class="w-full h-48 object-cover"
              />
              <div class="p-6 flex flex-col flex-1">
                <span class="text-xs font-semibold text-gray-500 mb-2 block"
                  >10 SEP 2025</span
                >
                <h3 class="text-xl font-bold mb-2 text-[var(--primary-blue)]">
                  Guía para implementar el empaque zero-waste en tu negocio
                </h3>
                <p class="text-gray-700 mb-4 flex-1">
                  Descubre los pasos clave para reducir residuos y adoptar
                  empaques sostenibles en tu emprendimiento.
                </p>
                <a
                  href="#"
                  class="inline-block text-sm font-semibold text-white bg-[var(--primary-blue)] px-5 py-2 rounded-full hover:bg-[var(--secondary-red)] transition text-center"
                >
                  Leer más <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div
              class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=600&q=80"
                alt="Noticia 2"
                class="w-full h-48 object-cover"
              />
              <div class="p-6 flex flex-col flex-1">
                <span class="text-xs font-semibold text-gray-500 mb-2 block"
                  >28 AGO 2025</span
                >
                <h3 class="text-xl font-bold mb-2 text-[var(--primary-blue)]">
                  Innovación en bioplásticos a partir de residuos orgánicos
                </h3>
                <p class="text-gray-700 mb-4 flex-1">
                  Nuevas tecnologías permiten crear bioplásticos biodegradables,
                  impulsando la economía circular.
                </p>
                <a
                  href="#"
                  class="inline-block text-sm font-semibold text-white bg-[var(--primary-blue)] px-5 py-2 rounded-full hover:bg-[var(--secondary-red)] transition text-center"
                >
                  Leer más <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
            <div
              class="bg-white rounded-xl shadow-xl overflow-hidden flex flex-col transform transition-transform duration-200 hover:scale-105"
            >
              <img
                src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=600&q=80"
                alt="Noticia 3"
                class="w-full h-48 object-cover"
              />
              <div class="p-6 flex flex-col flex-1">
                <span class="text-xs font-semibold text-gray-500 mb-2 block"
                  >15 JUL 2025</span
                >
                <h3 class="text-xl font-bold mb-2 text-[var(--primary-blue)]">
                  Entrevista: El futuro del comercio sostenible
                </h3>
                <p class="text-gray-700 mb-4 flex-1">
                  Expertos analizan las tendencias y oportunidades para negocios
                  responsables en Latinoamérica.
                </p>
                <a
                  href="#"
                  class="inline-block text-sm font-semibold text-white bg-[var(--primary-blue)] px-5 py-2 rounded-full hover:bg-[var(--secondary-red)] transition text-center"
                >
                  Leer más <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
  
  </body>
</html>
>>>>>>> 74f6de3212acec19c8776442bdc8bc6d6ac7fe93:tendalyStoreProject/resources/views/principal.blade.php
