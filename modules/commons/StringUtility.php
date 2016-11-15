<?php

namespace commons;

/**
 * Page-level DocBlock
 */

/**
 * La classe contiene funzioni di utilità varie riguardandi le variabili di tipo stringa.
 *
 * Glossario dei termini usati nella documentazione delle funzioni:
 * - Strict String o Stringa in senso stretto: variabile o valore di tipo stringa, che contiene caratteri comprensibili,
 *   ovvero non è composta da SOLI caratteri di controllo, non è nulla, non è vuota e non è composta di soli spazi. Una stringa
 *   che contiene qualche carattere di controllo viene comunque considerata stretta. Non sono ammessi valori tipo numerico.
 *
 * @package commons
 */
final class StringUtility {

    /**
     * Verifica se una variabile è una stringa in senso stretto.
     *
     * @param mixed $var Variabile da controllare
     * @return boolean True se la variabile è una stringa in senso stretto, false altrimenti.
     */
    static function isStrictString($var)
    {
        /**
         * is_string ha i seguenti comportamenti:
         * - is_string(boolean) = false
         * - is_string(null)    = false
         * - is_string(integer) = false
         * - is_string(fload)   = false
         */
        if (!is_string($var) || ctype_cntrl($var) || trim($var) === '')
        {
            return false;
        }

        return true;
    }

    /**
     * Verifica se una variabile è una stringa in senso stretto, se non lo è, ritorna un valore di default.
     *
     * @param mixed $var Variabile da controllare
     * @param mixed $defaultValue Valore di default da restituire se la stringa non è una stringa in senso stretto
     * @return mixed Restituisce la stringa stessa se è una stringa in senso stretto, altrimenti il valore di default
     * (che potrebbe anche non essere una stringa)
     */
    static function ifStrictString($var, $defaultValue)
    {
        return self::isStrictString($var) ? $var : $defaultValue;
    }

}
