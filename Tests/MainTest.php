<?php

  require '../ISO7064Mod97_10.php';

class MainTest extends PHPUnit_Framework_TestCase
{
	public function testNumbers()
    {
      $c = new ISO7064Mod97_10();
      $n = 107571;
      $validNumber = '10757107';
      $invalidNumber = '10767107';
      

      $this->assertEquals( $validNumber, $c->encode($n) );
	  $this->assertNotEquals( $invalidNumber, $c->encode($n) );
      
      $this->assertTrue($c->verify($validNumber));
      $this->assertFalse($c->verify($invalidNumber));
      
      
      
    }
}