<?php include_once 'Views/template/header-principal.php'; ?>

<!-- banner section start -->
<div class="banner_section layout_padding">
  <div class="container">
    <div id="my_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="banner_taital">Accesorios<br>Escolares</h1>
              <div class="buynow_bt"><a href="#">Comprar Ahora</a></div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="banner_taital">Accesorios <br>Oficina</h1>
              <div class="buynow_bt"><a href="#">Comprar Ahora</a></div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="banner_taital">Accesorios<br>Empresa</h1>
              <div class="buynow_bt"><a href="#">Comprar Ahora</a></div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
    </div>
  </div>
</div>
<!-- banner section end -->

<!-- Carrusel con todos los productos -->
<div class="product_carousel_section">
  <div class="container">
    <h1 class="fashion_taital text-uppercase text-bordered" style="color: #FFFFFF; background-color: rgba(128, 128, 128, 0.7); padding: 10px;">Todos los productos</h1>
    <div id="all_products_carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php 
        $isFirst = true;
        $productChunks = array_chunk(array_merge(...array_map(function($categoria) { return $categoria['productos']; }, $data['categorias'])), 3);
        foreach ($productChunks as $chunk) { 
        ?>
          <div class="carousel-item <?php echo $isFirst ? 'active' : ''; ?>">
            <div class="row">
              <?php foreach ($chunk as $producto) { ?>
                <div class="col-md-4">
                  <div class="box_main">
                    <h4 class="shirt_text"><?php echo $producto['nombre']; ?></h4>
                    <p class="price_text">Precio <span style="color: #262626;">S/ <?php echo $producto['precio']; ?></span></p>
                    <div class="text-center">
                      <img src="<?php echo BASE_URL . $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" style="max-width: 100%; height: auto;" />
                    </div>
                    <div class="btn_main">
                      <div class="buy_bt"><a href="#" class="btnAddcarrito" prod="<?php echo $producto['id']; ?>">Añadir</a></div>
                      <div class="seemore_bt"><a href="#">Leer más</a></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php 
          $isFirst = false;
        } 
        ?>
      </div>
      <a class="carousel-control-prev small-carousel-control" href="#all_products_carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next small-carousel-control" href="#all_products_carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
    </div>
  </div>
</div>
<!-- Carrusel de productos fin -->

<!-- fashion section start -->
<?php foreach ($data['categorias'] as $categoria) { ?>
  <div class="fashion_section">
    <div class="container" id="categoria_<?php echo $categoria['id']; ?>">
      <h1 class="fashion_taital text-uppercase"><?php echo $categoria['categoria']; ?></h1>
      <div class="row">
        <?php foreach ($categoria['productos'] as $producto) { ?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="box_main">
              <h4 class="shirt_text"><?php echo $producto['nombre']; ?></h4>
              <p class="price_text">Precio <span style="color: #262626;">S/ <?php echo $producto['precio']; ?></span></p>
              <div class="text-center">
                <img src="<?php echo BASE_URL . $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" style="max-width: 100%; height: auto;" />
              </div>
              <div class="btn_main">
                <div class="buy_bt"><a href="#" class="btnAddcarrito" prod="<?php echo $producto['id']; ?>">Añadir</a></div>
                <div class="seemore_bt"><a href="#">Leer más</a></div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php } ?>

<?php include_once 'Views/template/footer-principal.php'; ?>

<!-- Chatbot Code -->
<style>
  #chatbot-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: transparent;
    color: white;
    border: none;
    border-radius: 50%;
    padding: 20px;
    font-size: 24px;
    cursor: pointer;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url('assets/images/chatbot.png');
    background-size: cover;
  }

  #chatbot-button .fa-robot {
    font-size: 24px;
  }

  #chatbot-label {
    position: absolute;
    bottom: 70px;
    right: 17px;
    background-color: #007bff;
    color: white;
    padding: 5px 10px;
    border-radius: 10px;
    white-space: nowrap;
    z-index: 1000;
    display: block;
    font-size: 12px; /* Texto más pequeño */
  }

  @keyframes fadeBlink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0; }
  }

  #chatbot-container {
    display: none;
    position: fixed;
    bottom: 80px;
    right: 20px;
    width: 400px;
    height: 600px;
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
    z-index: 1000;
  }

  .carousel-control-prev, .carousel-control-next {
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    width: 40px;
    height: 40px;
  }

  .carousel-control-prev.small-carousel-control, .carousel-control-next.small-carousel-control {
    background: rgba(0, 0, 0, 0.5);
    padding: 5px;
    font-size: 20px;
    width: 20px;
    height: 20px;
    top: 50%;
    transform: translateY(-50%);
  }

  .text-bordered {
    border: 2px solid #FFFFFF;
    padding: 10px;
    display: inline-block;
  }

  #chatbot-button:hover #chatbot-label {
    animation: fadeBlink 1s infinite;
  }
</style>

<!-- Botón de Chatbot -->
<div id="chatbot-button">
  <i class="fas "></i>
  <div id="chatbot-label">Chatbot Américo</div>
</div>

<!-- Contenedor del Chatbot -->
<div id="chatbot-container">
  <iframe id="chatbot-frame" src="" style="width: 100%; height: 100%; border: none;"></iframe>
</div>

<script>
  async function callAzureOpenAI(message) {
    const api_base = 'https://openiademocapitan.openai.azure.com/';
    const api_key = '124b6e4bb42346368762d086a79f64d8';
    const deployment_id = 'gpt4o';
    const endpoint = `${api_base}openai/deployments/${deployment_id}/extensions/chat/completions?api-version=2024-02-15-preview`;

    const response = await fetch(endpoint, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${api_key}`
      },
      body: JSON.stringify({
        "messages": [{"role": "user", "content": message}],
        "max_tokens": 50
      })
    });

    const data = await response.json();
    return data.choices[0].message.content;
  }

  document.getElementById('chatbot-button').addEventListener('click', function() {
    var chatbotContainer = document.getElementById('chatbot-container');
    if (chatbotContainer.style.display === 'none') {
      chatbotContainer.style.display = 'block';
      document.getElementById('chatbot-frame').src = 'https://libreriamia.azurewebsites.net/';
    } else {
      chatbotContainer.style.display = 'none';
    }
  });

  // Función para manejar añadir al carrito
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btnAddcarrito').forEach(function(button) {
      button.addEventListener('click', function(event) {
        event.preventDefault();
        const prodId = this.getAttribute('prod');
        console.log('Producto añadido al carrito:', prodId);
      });
    });
  });
</script>
