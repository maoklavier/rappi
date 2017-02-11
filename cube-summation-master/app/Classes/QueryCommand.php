<?php

namespace App\Classes;

class QueryCommand implements ICommand
{
  private $results;
  private $x1,$y1,$z1;
  private $x2,$y2,$z2;
  private $cube;

  function __construct(Cube $cube,$x1,$y1,$z1,$x2,$y2,$z2)
  {
    $this->cube  = $cube;
    $this->x1    = $x1;
    $this->y1    = $y1;
    $this->z1    = $z1;
    $this->x2    = $x2;
    $this->y2    = $y2;
    $this->z2    = $z2;
  }

  public function execute()
  {
    $x1 = $this->x1;
    $y1 = $this->y1;
    $z1 = $this->z1;
    $x2 = $this->x2;
    $y2 = $this->y2;
    $z2 = $this->z2;

    if( !$this->validate($x1,$y1,$z1,$x2,$y2,$z2) ){
      $this->results[] = "bad input for query";
      return;
    }

    $this->results = (string) $this->cube->sum($x1,$y1,$z1,$x2,$y2,$z2);
  }

  public function results()
  {
    return (string) $this->results;
  }

  public function validate($x1,$y1,$z1,$x2,$y2,$z2){
    $result = true;

    if( $x1 > $x2 || $y1 > $y2 || $z1 > $z2 ){
      $result = false;
    }

    if ( ($x1 < 1) && ($x1 > $this->cube->size()) ) {
      $result = false;
    }

    if ( ($y1 < 1) && ($y1 > $this->cube->size()) ) {
      $result = false;
    }

    if ( ($z1 < 1) && ($z1 > $this->cube->size()) ) {
      $result = false;
    }

    if ( ($x2 < 1) && ($x2 > $this->cube->size()) ) {
      $result = false;
    }

    if ( ($y2 < 1) && ($y2 > $this->cube->size()) ) {
      $result = false;
    }

    if ( ($z2 < 1) && ($z2 > $this->cube->size()) ) {
      $result = false;
    }

    return $result;
  }
}
