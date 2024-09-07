<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase {
 
 public function testGreetings()
 {
     $greetings = 'Hello World';
     $this->assertEquals('Hello World', $greetings);
 }

}