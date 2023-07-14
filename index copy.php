<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <title>ANFIBRO</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="manifest" href="manifest.json" />

    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#000000" />
    <meta name="msapplication-navbutton-color" content="#000000" />
    <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"
    />
    <meta name="msapplication-starturl" content="./" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link rel="icon" type="image/png" />
    <link rel="apple-touch-icon" type="image/png" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.qrcode@1.0.3/jquery.qrcode.min.js"></script>

    <link rel="stylesheet" href="src/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="src/css/styles.css" />
  </head>

  <body class="m-0 border-0 bd-example m-0 border-0">
    <main class="container justify-content-center">
      <div class="text-center">
        <h2><strong class="text-light">CARTEIRA ANFIBRO</strong></h2>
      </div>

      <div id="root"></div>

      <!--template id="swiper"-->
      <!-- Slider main container -->
      <div class="card swiper mySwiper" style="width: 20rem; display: none">
        <div class="swiper-wrapper mb-4">
          <div class="swiper-slide slide_1"></div>
          <div class="swiper-slide slide_2"></div>
          <div class="swiper-slide slide_3"></div>
        </div>
        <!-- SLIDER EXPORTAR-->
        <div class="swiper-pagination"></div>
      </div>
      <!--/template-->

      <template id="view1">
        <!-- View card -->
        <div class="cards">
          <div class="row justify-content-center">
            <div class="col-6 m-auto">
              <img
                id="foto"
                src=""
                class="m-auto d-block w-100 p-1"
                alt="foto"
              />
            </div>
            <div class="col-6 my-auto mr-1">
              <img
                src="assets/logo-anfibro.png"
                class="m-auto d-block w-100 p-1"
                alt="logo"
              />
            </div>
          </div>
          <div class="card-body">
            <div class="fs-6 fw-semibold">NOME COMPLETO</div>
            <h5 id="nome" class="card-title fw-bolder"></h5>
            <div class="card-text row mt-3">
              <div class="col-6">
                <strong>NÚMERO CPF </strong>
                <div id="cpf"></div>
              </div>
              <div class="col-6">
                <strong>CID:</strong>
                <span id="cid"></span>
              </div>
              <div class="col-12">
                <strong>CIDADE </strong>
                <div id="cidade"></div>
              </div>
              <div class="col-6">
                <strong>DATA DE EMISSÃO</strong>
                <div id="emissao"></div>
              </div>
              <div class="col-6">
                <strong>DATA DE VALIDADE</strong>
                <div id="validade"></div>
              </div>
              <div class="col-12">
                <strong>SITUAÇÃO</strong>
                <div id="situacao"></div>
              </div>
            </div>
          </div>
        </div>
      </template>

      <template id="view2">
        <div class="cards text-center mt-3">
          <div class="card-body">
            <div id="qrcode"></div>
          </div>
        </div>
      </template>
      <template id="view3">
        <div class="cards text-center mt-3">
          <div class="card-body text-center">
            <button id="export" class="btn">
              <i class="fa fa-file-export"></i>
              <img
                src="assets/export.png"
                class="d-block w-100"
                width="126"
                height="126"
                alt="logo"
              /><strong>Salvar</strong>
            </button>
          </div>
        </div>
      </template>
    </main>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script type="module" src="./script.js"></script>
  </body>
</html>
