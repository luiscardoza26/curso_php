<?php 

declare(strict_types=1); // Esta solo es posible esuarla a nivel de archivo y se debe definir arriba de todo el codigo.

function render_template(string $template, array $data = []) {
    extract($data); // Ete componente se encarga de extraer todos los datos que trafa el array compuesto y lo signa en variables.
    require "templates/$template.php";
}

function get_data(string $url): array {
    // Forma corta de obtener los datos de una API
    $resultado = file_get_contents($url); // Solo si queremos el GET de la API
    // Obtenemoos la data y convertimos a json el resultado
    $data = json_decode($resultado, true);
    return $data;
}

function get_until_message(int $days): string {
    return match (true) {
        $days === 0 => "¡Hoy se estrena la película!",
        $days === 1 => "Mañana se estrena la película!",
        $days < 7   => "La película se extrenara esta semana...",
        $days < 30  => "La película se estrenará en un mes...",
        default     => "Quedan $days días hasta el estreno de la película"
    };
}