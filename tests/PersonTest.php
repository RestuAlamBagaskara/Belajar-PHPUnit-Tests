<?php


namespace Alambagaskara\BelajarPhpUnit;


use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    private Person $person;

    //fungsi yang akan selalu dipanngil sebelum unit test dieksekusi
    protected function setUp(): void
    {

    }

    //Annotations before untuk membuat setup function lebih dari satu
    /**
     * @before
     */
    public function createPerson()
    {
        $this->person = new Person("Alam");
    }

    public function testSuccess()
    {
        self::assertEquals("Hello Budi, my name is Alam", $this->person->sayHello("Budi"));
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }

    public function testGoodByeSuccess()
    {
        $this->expectOutputString("Good bye Budi" . PHP_EOL);
        $this->person->sayGoodBye("Budi");
    }


}