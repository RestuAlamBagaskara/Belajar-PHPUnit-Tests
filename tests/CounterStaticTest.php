<?php

    namespace Alambagaskara\BelajarPhpUnit;

    use PHPUnit\Framework\TestCase;

    class CounterStaticTest extends TestCase {

        public static Counter $counter;

        //Membuat setUpBeforeClass supaya data tidak di instansiasi lagi setiap test
        public static function setUpBeforeClass(): void
        {
            self::$counter = new Counter();
        }

        public function testFirst()
        {
            self::$counter->increment();
            self::assertEquals(1, self::$counter->getCounter());
        }

        public function testSecond()
        {
            self::$counter->increment();
            self::assertEquals(2, self::$counter->getCounter());
        }

         //Membuat tearDownAfterClass supaya data tidak di instansiasi lagi setiap test
        public static function tearDownAfterClass(): void
        {
            echo "Unit Test Selesai" . PHP_EOL;
        }

    }