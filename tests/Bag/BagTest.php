<?php

namespace Tests\Bag;

use PHPUnit\Framework\TestCase;
use Bag\Bag;

/**
 * Class BagTest
 *
 * @package Tests\Bag
 */
class BagTest extends TestCase
{
    /**
     * @test
     */
    public function test_get_value_from_bag()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $this->assertSame('bbb', $bag->get('aaa'));
        $this->assertSame('ddd', $bag->get('ccc'));
    }

    /**
     * @test
     */
    public function test_no_key_get_null()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $this->assertNull($bag->get('nokey', null));
    }

    /**
     * @test
     */
    public function test_all_method_return_all_values()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $this->assertEquals(['aaa' => 'bbb', 'ccc' => 'ddd'], $bag->all());
    }

    /**
     * @test
     */
    public function test_keys_method_return_all_keys()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $this->assertEquals(['aaa', 'ccc'], $bag->keys());
    }

    /**
     * @test
     */
    public function test_has_method_return_all_values()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $this->assertTrue(true, $bag->has('aaa'));
        $this->assertFalse(false, $bag->has('nokey'));
    }

    /**
     * @test
     */
    public function test_remove_key()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $bag->remove('ccc');

        $this->assertNull($bag->get('ccc'));
        $this->assertEquals(['aaa' => 'bbb'], $bag->all());
    }

    /**
     * @test
     */
    public function test_clear_method_remove_all_values()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $bag->clear();

        $this->assertFalse($bag->has('aaa'));
        $this->assertFalse($bag->has('ccc'));
        $this->assertEquals([], $bag->all());
    }

    /**
     * @test
     */
    public function test_set_value()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $bag->set('key', 'dummy');
        $bag->set('key2', 'dummy2');

        $this->assertSame('dummy', $bag->get('key'));
        $this->assertSame('dummy2', $bag->get('key2'));
    }

    /**
     * @test
     */
    public function test_merge_method_overwrite_values_if_same_key_has()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $bag->merge(['aaa' => 'merged', 'append' => 'ok']);

        $this->assertSame('merged', $bag->get('aaa'));
        $this->assertSame('ddd', $bag->get('ccc'));
        $this->assertSame('ok', $bag->get('append'));
        $this->assertSame(['aaa' => 'merged', 'ccc' => 'ddd', 'append' => 'ok'], $bag->all());
    }

    /**
     * @test
     */
    public function test_count_method()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        $this->assertSame(2, count($bag));
        $this->assertSame(2, $bag->count());
    }

    /**
     * @test
     */
    public function test_bag_array_access()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        // offsetGet
        $this->assertSame('bbb', $bag['aaa']);

        // offsetSet
        $bag['key_append'] = 'dummy';
        $this->assertSame('dummy', $bag['key_append']);

        // offsetExists
        $this->assertTrue(isset($bag['key_append']));

        // offsetUnset
        unset($bag['key']);
        $this->assertArrayNotHasKey('key', $bag);
    }

    /**
     * @test
     */
    public function test_bag_property_access()
    {
        $bag = new Bag(['aaa' => 'bbb', 'ccc' => 'ddd']);

        // __set
        $bag->dummy = 'dummyvalue';

        // __get
        $this->assertSame('dummyvalue', $bag->dummy);
    }
}
