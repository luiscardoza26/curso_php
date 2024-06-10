<?php

declare(strict_types=1);

class NextMovie
{
    // Constructor
    // Promoted proporties -> apartir de PHP 8.0
    public function __construct(
        private string $title,
        private int $days_until,
        private string $poster_url,
        private string $release_date,
        private string $following_production,
        private string $overview
    ){
    }

    public function get_until_message(): string {

        $days = $this->days_until;

        return match (true) {
            $days === 0 => "¡Hoy se estrena la película!",
            $days === 1 => "Mañana se estrena la película!",
            $days < 7   => "La película se extrenara esta semana...",
            $days < 30  => "La película se estrenará en un mes...",
            default     => "Quedan $days días hasta el estreno de la película"
        };
    }

    public static function fetch_and_create_movie(string $api_url): NextMovie
    {
        // Forma corta de obtener los datos de una API
        $resultado = file_get_contents($api_url); // Solo si queremos el GET de la API
        // Obtenemoos la data y convertimos a json el resultado
        $data = json_decode($resultado, true);

        return new self(
            $data["title"],
            $data["days_until"],
            $data["poster_url"],
            $data["release_date"],
            $data["following_production"]["title"] ?? "Desconocido",
            $data["overview"]
        );
    }

    public function get_data()
    {
        return get_object_vars($this);
    }
}