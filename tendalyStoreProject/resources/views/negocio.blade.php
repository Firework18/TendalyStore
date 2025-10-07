@extends('layouts.app')
@section('titulo')
  Negocios
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
          background-image: url('assets/fondo_evea-1024x682.jpg');
          background-color: rgba(88, 130, 182, 0.863);
          background-blend-mode: multiply;
        "
      >
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 p-4 md:p-8">
          <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6">
            NEGOCIOS <br class="md:hidden" />
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
                src="assets/alimentacion.jpg"
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
                src="assets/cosmetica.jpg"
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
                src="assets/eficiencia.jpg"
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
                src="assets/moda.jpg"
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
