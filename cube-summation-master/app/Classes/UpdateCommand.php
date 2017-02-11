<?php

namespace App\Classes;
use App\Classes\ICommand;
use App\Classes\Cube;

class UpdateCommand implements ICommand
{

  private $results;
  private $cube;
  private $x,$y,$z,$W;

  function __construct(Cube &$cube,$x,$y,$z,$W)
  {
    $this->cube = $cube;
    $this->x    = $x;
    $this->y    = $y;
    $this->z    = $z;
    $this->W    = $W;
  }

  public function execute()
  {
    $x = $this->x;
    $y = $this->y;
    $z = $this->z;
    $W = $this->W;

    if( !$this->validate($x,$y,$z) ){
      $this->results[] = "bad input for update";
      return;
    }

    $this->cube->changeValue($x,$y,$z,$W);
  }

  public function results()
  {
    return (string) $this->results;
  }

  public function validate($x,$y,$z){

    $result = true;

    if( $x < 1 || $x > $this->cube->size() ){
      $result = false;
    }

    if( $y < 1 || $y > $this->cube->size() ){
      $result = false;
    }

    if( $z < 1 || $z > $this->cube->size() ){
      $result = false;
    }

    return $result;

  }

}
