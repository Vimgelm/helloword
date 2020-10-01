<?php


namespace App\components\World;

use App\components\terrain\MontainTerrain;

class WorldGen
{
    private $field_row = 20;
    private $field_col = 20;
    private $world_arr = array();
    private $mountain_symbol;

    function __construct()
    {
        $mountain = new MontainTerrain();
        $this->mountain_symbol = $mountain->getSymbol();
    }

    public function world_gen()
    {
        for ($i = 1; $i <= $this->field_row; $i++) {
            for ($k = 1; $k <= $this->field_col; $k++) {
                $terrain = self::getTerrain();
                $this->world_arr[$i][$k] = $terrain;
            }
        }
        return $this->world_arr;
    }

    private function getTerrain() //get random terrain for world map
    {
        $randomize = array('1' => $this->mountain_symbol, '2' => $this->mountain_symbol, '3' => '', '4' => '', '5' => '', '6' => '', '7' => '', '8' => '', '9' => '', '10' => '');//mountain  10%
        $terrain = array_rand($randomize);
        $terrain = $randomize[$terrain];
        return $terrain;
    }
}