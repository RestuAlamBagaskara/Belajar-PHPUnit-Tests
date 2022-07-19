<?php

namespace Alambagaskara\BelajarPhpUnit;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{

    private Counter $counter;

    //fungsi yang akan selalu dipanngil sebelum unit test dieksekusi
    protected function setUp(): void
    {
        $this->counter = new Counter();
        echo "Membuat Counter" . PHP_EOL;
    }


    //menandai unit test yang belum selesai dibuat
    public function testIncrement()
    {
        self::assertEquals(0, $this->counter->getCounter());
        self::markTestIncomplete("TODO do counter again");
        echo "TEST TEST" . PHP_EOL;
    }

    public function testCounter()
    {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());

        $this->counter->increment();
        $this->assertEquals(2, $this->counter->getCounter());

        $this->counter->increment();
        self::assertEquals(3, $this->counter->getCounter());
    }


    //Menggunakan annotations
    /**
     * @test
     */
    public function increment()
    {
        //Untuk me-lewatkan unit test, agar tidak dijalankan sebagai test tapi tetap muncul di laporan
        self::markTestSkipped("Masih ada error yang bingung");

        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());
    }

    public function testFirst(): Counter
    {
        $this->counter->increment();
        $this->assertEquals(1, $this->counter->getCounter());

        return $this->counter;
    }

    //Annotations depend membuat test yang tergantung dari hasil tests lainnya
    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter): void
    {
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());
    }

    //Selalu dipanggil setelah fungsi test selesai
    protected function tearDown(): void
    {
        echo "Tear Down" . PHP_EOL;
    }

    //Menggunakan annotation after ntuk membuat lebih dari satu fungsi tearDown
    /**
     * @after
     */
    protected function after(): void
    {
        echo "After" . PHP_EOL;
    }

    //Skip berdasarkan kondisi tertentu
    /**
     * @requires OSFAMILY Windows
     */
    public function testOnlyWindows()
    {
        self::assertTrue(true, "Only in Windows");
    }
}
