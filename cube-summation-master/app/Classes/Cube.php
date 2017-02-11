<?php

namespace App\Classes;

class Cube
{

  private $data;
  const DEFAULT_VALUE = 0;
  const DEFAULT_SIZE = 1;

  public function __construct( $size = self::DEFAULT_SIZE ){

    $this->data = array_fill(0,$size,
      array_fill(0,$size,
        array_fill(0,$size,self::DEFAULT_VALUE)
      )
    );

	}

  public function at($i,$j,$k){
    $i--; $j--; $k--;
		return isset($this->data[$i][$j][$k]) ? $this->data[$i][$j][$k] : NULL;
	}

  public function size(){
		return count($this->data);
	}

  public function changeValue($x,$y,$z,$value){
    // TODO: validate x,y,z in range
    $x--; $y--; $z--;
    $this->data[$x][$y][$z] = $value;
  }

  public function sum($x1,$y1,$z1,$x2,$y2,$z2)
  {
    $x1--; $y1--; $z1--;
    $x2--; $y2--; $z2--;
    $sum = 0;
    for ($i=$x1; $i <= $x2 ; $i++) {
      for ($j=$y1; $j <= $y2; $j++) {
        for ($k=$z1; $k <= $z2; $k++) {
          $sum += $this->data[$i][$j][$k];
        }
      }
    }
    return $sum;
  }

}
