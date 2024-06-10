<?php
declare(strict_types=1);

class SuperHero
{

    // Constructor
    // Promoted Properties -> Apartir de PHP 8.0
    public function __construct(
        readonly public string $name, 
        public array $powers, 
        public string $planet
    ){
    }

    public function attack()
    {
        return "¡$this->name ataca con sus poderes!";
    }

    public function show_all()
    {
        return get_object_vars($this);
    }

    public function description()
    {
        $powers = implode(", ", $this->powers);
        return "El superhéroe $this->name viene de $this->planet y tiene los siguientes poderes: $powers";
    }

    public static function random()
    {
        $names = ["Batman", "Superman", "Spiderman", "Wonder Woman"];
        $powers = [
            ["fuerza", "agilidad", "velocidad", "inteligencia"],
            ["invicibilidad", "tenacidad", "telequinesis"]
        ];
        $planetas = ["Asgard", "Venus", "Marte", "Jupiter"];

        // array_rand() -> Devuelve un elemento aleatorio de un array, pero devuelve el indice o llave del elemento y no su valor.
        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planetas[array_rand($planetas)];

        return new self($name, $power, $planet);
        
    }
}

// Estos es un metodo publico de la clase el cual debe ser instanciado para poder ser usado
// $hero = new SuperHero("Superman", ["fuerza", "agilidad"], "Krypton");
// echo $hero->description();

// Esto es un metodo estatico de la clase el cual no necesita ser instanciado para poder ser usado
$hero = SuperHero::random();
echo $hero->description();