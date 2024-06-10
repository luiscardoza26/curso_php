<main>
    <!-- <pre style="font-size: 8px; overflow:scroll; height: 250px;">
        <?php var_dump($data); ?>
    </pre> -->
    <section>
        <img src="<?= $poster_url; ?>" whidth="200" alt="Poster de <?= $title; ?>"
        style="border-radius:16px"/>
    </section>

    <hgroup>
        <h3> <?= $title; ?></h3>
        <h4> <?= $until_message ?> </h4>
        <p> Fecha de estreno: <?= $release_date; ?> </p>
        <p> Siguiente pelicula es: <?= $following_production; ?> </p>
    </hgroup>
</main>