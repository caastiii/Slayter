<!-- 1. Estilos visuales de Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  .carousel-img-custom {
    width: 100%;
    height: 60vh;
    
    object-fit: cover; /* Asegura que la imagen llene el espacio sin deformarse */
    object-position: center center; /* Centra el recorte para no perder el escenario ni el techo */
  }
</style>

<!-- 2. Carrusel -->
<div id="carouselExampleSlidesOnly" class="carousel slide w-100 overflow-hidden" data-bs-ride="carousel" data-bs-interval="4000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/Carrousel1.jpg') }}" class="d-block w-100 carousel-img-custom" alt="Camerinos">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/Carrousel2.jpg') }}" class="d-block w-100 carousel-img-custom" alt="Obra de teatro con público">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/Carrousel3.jpg') }}" class="d-block w-100 carousel-img-custom" alt="Teatro vacío">
    </div>
  </div>
</div>

<!-- 3. LIBRERÍA DE BOOTSTRAP 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>