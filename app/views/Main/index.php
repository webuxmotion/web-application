<?php if (!empty($slides)): ?>
  <?=$this->getPart('slider', ['slides' => $slides])?>
<?php endif; ?>

<?php if (!empty($products)): ?>
  <?=$this->getPart('recommended', ['products' => $products])?>
<?php endif; ?>

<section class="services">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="section-title">НАШІ ПЕРЕВАГИ</h3>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="service-item">
          <p class="text-center"><i class="fas fa-shipping-fast"></i></p>
          <p>Прямі поставки від виробників</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="service-item">
          <p class="text-center"><i class="fas fa-cubes"></i></p>
          <p>Широкий асортимент товару</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="service-item">
          <p class="text-center"><i class="fas fa-hand-holding-usd"></i></p>
          <p>Приємні та конкурентні ціни</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="service-item">
          <p class="text-center"><i class="fas fa-user-cog"></i></p>
          <p>Професійна консультація та сервіс</p>
        </div>
      </div>

    </div>
  </div>
</section>