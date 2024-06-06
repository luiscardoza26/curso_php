<?php 
# Forma basica de llamar o utilizar una api en PHP
const API_URL = "HTTPS://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la peticion y no mostrarla n pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la peticion y guardar el resultado
$resultado = curl_exec($ch);

// Una alternatica para solo obtener el GET de una API, es utilizar file_get_contents
// $resultado = file_get_contents(API_URL); // Solo si queremos el GET de la API

// Obtenemoos la data y convertimos a json el resultado
$data = json_decode($resultado, true);

// Cerramos la conexion curl
curl_close($ch);
// Vemos que tipo de datos y valor trae la data
// var_dump($data);
?>

<head>
    <meta charset="UTF-8">
    <title>La proxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Centered viewport --> 
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <!-- <pre style="font-size: 8px; overflow:scroll; height: 250px;">
        <?php var_dump($data); ?>
    </pre> -->
    <section>
        <img src="<?= $data["poster_url"]; ?>" whidth="200" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius:16px"/>
    </section>

    <hgroup>
        <h3> <?= $data["title"]; ?> Se estrena en: <?= $data["days_until"]; ?> días </h3>
        <p> Fecha de eztreno: <?= $data["release_date"]; ?> </p>
        <p> Siguiente pelicula es: <?= $data["following_production"]["title"]; ?> </p>
    </hgroup>
</main>






<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>