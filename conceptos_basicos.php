<?php 
    $name = "Luis";
    $isDev = true;
    $age = 22;

    // Nos permite saber el tipo de dato y el valor de una variable
    // var_dump($name);
    // var_dump($isDev);
    // var_dump($age);

    // Constantes
    // Globales: Utlizamos la palabra reservada define.
    define('LOGO_URL', "https://www.php.net//images/logos/new-php-logo.svg");

    // Interpolacion  de cadenas de texto y variables
    $output = "Hola $name, con una edad de $age";

    // Constantes locales: Utilizamos la palabra reservada const
    const NOMBRE = "Luis";

    // $isOld = $age > 40;

    // El match funciona como un switch o un if, sin embargo este nos permite evaluar mucho codigo de manera
    // mas legible y menos lineas de codigo y a futuro es mas facil de manter.
    
    /* The `` variable is using the `match` expression in PHP to determine a message based on
    the value of the `` variable. */
    $outputAge = match(true) {
        $age < 2    => "Eres un Bebe!",
        $age < 10   => "Eres un niño!",
        $age < 18   => "Eres un adolecente!",
        $age === 18 => "Eres mayor de edad, toma una cerveza!",
        $age < 40   => "Eres un adulto Joven!",
        $age < 60   => "Eres un Señor con experiencia natal!",
        default     => "Lo siento es trsite!"
    };

    // Arrays
    $languagesDev = ["PHP", "Python", "Java"];
    // Forma de agregar un nuevo elemento al arraeglo
    $languagesDev[] = "TypeScript";

    // Array Asociativo
    $person = [
        "name" => "Luis",
        "age" => 18,
        "isDev" => true,
        "languages" => ["PHP", "Java", "Python"]
    ];

    // Accediendo a los elementos del array asociativo
    $person["name"] = "nombre";
    $person["languages"][] = "TypeScript";
?>

<ul>
    <!-- Por medio de la variable $key obtnemos el indice de cada elemento dentro del arreglo -->
    <?php foreach ($languagesDev as $key => $language) : ?>
        <li> <?= $key . " " . $language ?> </li>
    <?php endforeach; ?>
</ul>

<!-- 
Esta sintaxis nos permite tener mucho codigo HTML dentro de php ademas de evitar utilizar constantemente la palabra echo
por otro lado, al utlizar esta sintasis el else if normal debe estar junto sin exepcion.
-->
<!-- <?php if ($isOld) : ?>
    <h2>Eres Viejo, Lo siento</h2>
<?php elseif ($isDev) : ?>
    <h2>No eres viejo, pero eres Dev, Estas jodido</h2>
<?php else : ?>
    <h2>Eres Joven, felicidades</h2>
<?php endif; ?> -->




<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="200">

<h1>
    <!-- Esta es la forma corta de utilizar php y echo dentro de una estructura HTML -->
    <?= $output ?>
    <br>
    <?= $outputAge ?>
</h1>





<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>