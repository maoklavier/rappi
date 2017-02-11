<?php

use App\Cube;
use App\UpdateCommand;
use App\QueryCommand;

class CommandTest extends TestCase
{
    public function testUpdateCommand()
    {
        $size = rand(1,100);
        $cube = new Cube($size);

        $x = rand(1,$size);
        $y = rand(1,$size);
        $z = rand(1,$size);
        $W = rand(pow(-10,9),pow(10,9));

        $updateCommand = new UpdateCommand($cube,$x,$y,$z,$W);
        $updateCommand->execute();

        $this->assertEquals($cube->at($x,$y,$z),$W);
    }

    public function testQueryCommand()
    {
      $size = rand(1,100);
      $cube = new Cube($size);

      $cube->changeValue(1,1,1,1);

      $x1 = 1; $x2 = $size;
      $y1 = 1; $y2 = $size;
      $z1 = 1; $z2 = $size;

      $queryCommand = new QueryCommand($cube,$x1,$y1,$z1,$x2,$y2,$z2);
      $queryCommand->execute();

      $this->assertEquals($queryCommand->sum(),1);
    }
}
