<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://checkout.culqi.com/js/v4"></script>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <div class ="col-12">
      <div class="card">
        <div class="card-header">
         INTEGRACION PASARELA DE PAGO CULQI
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-2">
                <button id="btn_pagar" class="btn btn-success">Comprar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  <script>
    Culqi.publicKey = 'pk_test_07e2b9f728f921sd';
    
Culqi.settings({
    title: 'Culqi Store',
    currency: 'PEN',  // Este parámetro es requerido para realizar pagos yape
    amount: 1000,  // Este parámetro es requerido para realizar pagos yape
    order: 'ord_live_0CjjdWhFpEAZlxlz', // Este parámetro es requerido para realizar pagos con pagoEfectivo, billeteras y Cuotéalo
    xculqirsaid: 'Inserta aquí el id de tu llave pública RSA',
    rsapublickey: 'Inserta aquí tu llave pública RSA',
  });

Culqi.options({
    lang: "auto",
    installments: false, // Habilitar o deshabilitar el campo de cuotas
    paymentMethods: {
      tarjeta: true,
      yape: true,
      bancaMovil: true,
      agente: true,
      billetera: true,
      cuotealo: true,
    },
    style: {
          logo: "https://static.culqi.com/v2/v2/static/img/logo.png",
    }
  });

/*Culqi.options({
      style: {
        logo: 'https://culqi.com/LogoCulqi.png',
        bannerColor: '', // hexadecimal
        buttonBackground: '', // hexadecimal
        menuColor: '', // hexadecimal
        linksColor: '', // hexadecimal
        buttonText: '', // texto que tomará el botón
        buttonTextColor: '', // hexadecimal
        priceColor: '' // hexadecimal
      }
  });*/

    const btn_pagar = document.getElementById('btn_pagar');

    btn_pagar.addEventListener('click', function (e) {
      // Abre el formulario con la configuración en Culqi.settings y CulqiOptions
        Culqi.settings({
        title: 'Culqi Store',
        currency: 'PEN',  // Este parámetro es requerido para realizar pagos yape
        amount: 1000,  // Este parámetro es requerido para realizar pagos yape
        order: 'ord_live_0CjjdWhFpEAZlxlz', // Este parámetro es requerido para realizar pagos con pagoEfectivo, billeteras y Cuotéalo
        xculqirsaid: 'Inserta aquí el id de tu llave pública RSA',
        rsapublickey: 'Inserta aquí tu llave pública RSA',
        });

        Culqi.options({
        lang: "auto",
        installments: false, // Habilitar o deshabilitar el campo de cuotas
        paymentMethods: {
          tarjeta: true,
          yape: true,
          bancaMovil: true,
          agente: true,
          billetera: true,
          cuotealo: true,
        },
         style: {
          logo: "https://static.culqi.com/v2/v2/static/img/logo.png",
        }
         });

      Culqi.open();
      e.preventDefault();
  })

  function culqi() {
    if (Culqi.token) {  // ¡Objeto Token creado exitosamente!
      const token = Culqi.token.id;
      const email = Culqi.token.email;
      console.log('Se ha creado un Token: ', token);
      //En esta linea de codigo debemos enviar el "Culqi.token.id"
      //hacia tu servidor con Ajax
      /*$.ajax({
        url:"procesarPago.php",
        type:"POST",
        data:{
            token:token,
            email:email
        }
      }).done(function(resp)){
        alert(resp);
      }*/



    
    } else if (Culqi.order) {  // ¡Objeto Order creado exitosamente!
      const order = Culqi.order;
      console.log('Se ha creado el objeto Order: ', order);

    } else {
      // Mostramos JSON de objeto error en consola
      console.log('Error : ',Culqi.error);
    }
  };

  </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>