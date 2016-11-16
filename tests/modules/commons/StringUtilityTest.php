<?php

use Commons\StringUtility as StringUtility;

/**
 * @author Giorgia
 */
class StringUtilityTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        
    }

    public function tearDown()
    {
        
    }

    /**
     * Test di isStrictString nel caso di variabile nulla.
     */
    public function testIsStrictString_NULL()
    {
        $this->assertFalse(StringUtility::isStrictString(null));
    }

    /**
     * Test di isStrictString nel caso di variabile con stringa vuota.
     */
    public function testIsStrictString_EMPTY()
    {
        $this->assertFalse(StringUtility::isStrictString(''));
    }

    /**
     * Test di isStrictString nel caso di variabile con stringa vuota.
     */
    public function testIsStrictString_SPACE()
    {
        $this->assertFalse(StringUtility::isStrictString(' '));
    }

    /**
     * Test di isStrictString nel caso di variabile con spazi multipli.
     */
    public function testIsStrictString_SPACES()
    {
        $this->assertFalse(StringUtility::isStrictString('     '));
    }

    /**
     * Test di isStrictString nel caso di variabile numero intero.
     */
    public function testIsStrictString_INTEGER()
    {
        $this->assertFalse(StringUtility::isStrictString(42));
    }

    /**
     * Test di isStrictString nel caso di variabile numero a virgola mobile.
     */
    public function testIsStrictString_FLOAT()
    {
        $this->assertFalse(StringUtility::isStrictString(42.42));
    }

    /**
     * Test di isStrictString nel caso di variabile booleana.
     */
    public function testIsStrictString_BOOLEAN_TRUE()
    {
        $this->assertFalse(StringUtility::isStrictString(true));
    }

    /**
     * Test di isStrictString nel caso di variabile booleana.
     */
    public function testIsStrictString_BOOLEAN_FALSE()
    {
        $this->assertFalse(StringUtility::isStrictString(false));
    }

    /**
     * Test di isStrictString nel caso di variabile con un solo carattere di controllo.
     */
    public function testIsStrictString_CONTROLCHAR()
    {
        $this->assertFalse(StringUtility::isStrictString("\x0"));
    }

    /**
     * Test di isStrictString nel caso di variabile con caratteri di controllo.
     */
    public function testIsStrictString_CONTROLCHARS()
    {
        $var = "\000\001\002\003\004\005\006\007\010\011\012\013\014\015\016\017\020\021\022\023\024\025\026\027\030\031\032\032\033\034\035\036\037";
        $this->assertFalse(StringUtility::isStrictString($var));
    }

    /**
     * Test di isStrictString nel caso di variabile stringa semplice.
     */
    public function testIsStrictString_SIMPLE_STRING()
    {
        $this->assertTrue(StringUtility::isStrictString('Answer to the Ultimate Question of Life, the Universe, and Everything'));
        $this->assertTrue(StringUtility::isStrictString("Answer to the Ultimate Question of Life, the Universe, and Everything"));
    }

    /**
     * Test di isStrictString nel caso di variabile stringa semplice più caratteri di controllo.
     */
    public function testIsStrictString_STRING_PLUS_CONTROL_CHARS()
    {
        $this->assertTrue(StringUtility::isStrictString("Answer\011to\011the\011Ultimate\011Question\011of\011Life, \011the\011Universe, \011and\011Everything\007"));
    }

    /**
     * Test di ifStrictString.
     */
    public function testIfStrictString()
    {
        $var = array(null, '', ' ', '    ', 42, 42.42, true, false, "\x0", "\000\001\002\003\004\005\006\007\010\011\012\013\014\015\016\017\020\021\022\023\024\025\026\027\030\031\032\032\033\034\035\036\037");

        foreach ($var as $value) {
            $this->assertSame(StringUtility::ifStrictString($value, 'Answer to the Ultimate Question of Life, the Universe, and Everything'), 'Answer to the Ultimate Question of Life, the Universe, and Everything');
            $this->assertNotSame(StringUtility::ifStrictString('Answer to the Ultimate Question of Life, the Universe, and Everything', $value), $value);
        }
    }
}
