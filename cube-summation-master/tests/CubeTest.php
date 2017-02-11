<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Cube;

class CubeTest extends TestCase
{
    public function testCubeCreation()
    {
        $cube = new Cube;
        $this->assertEquals($cube->size(),Cube::DEFAULT_SIZE);

        $size = rand(1,100);
        $cube = new Cube($size);
        $this->assertEquals($cube->size(),$size);
    }

    public function testCubeDefaultValues()
    {
      $size = rand(1,100);
      $cube = new Cube($size);

      $this->assertEquals($cube->at(1,1,1),Cube::DEFAULT_VALUE);
      $this->assertEquals($cube->at($size,$size,$size),Cube::DEFAULT_VALUE);
      $this->assertEquals($cube->at(rand(1,$size),rand(1,$size),rand(1,$size)),Cube::DEFAULT_VALUE);
    }

    public function testAccessingCubeInvalidPositions()
    {
      $cube = new Cube;

      $this->assertEquals($cube->at(0,0,0),NULL);

      $size = $cube->size();
      $this->assertEquals($cube->at($size+1,$size+1,$size+1),NULL);
    }

    public function testChangeValue()
    {
      $size = rand(1,100);
      $cube = new Cube($size);

      $x = rand(1,$size);
      $y = rand(1,$size);
      $z = rand(1,$size);

      $W = rand(pow(-10,9),pow(10,9));

      $cube->changeValue($x,$y,$z,$W);

      $this->assertEquals($cube->at($x,$y,$z),$W);
    }

    public function testSumOfValues()
    {
      $size = rand(1,100);
      $cube = new Cube($size);

      $cube->changeValue(1,1,1,1);

      $x1 = 1; $x2 = $size;
      $y1 = 1; $y2 = $size;
      $z1 = 1; $z2 = $size;

      $this->assertEquals($cube->sum($x1,$y1,$z1,$x2,$y2,$z2),1);

    }

}
