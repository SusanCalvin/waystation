<?php
/**
 * SimpleMessage.php
 */
namespace Commons;

use Commons\Message;

/**
 * Rappresenta un messaggio semplice, ovvero composto da un tipo (type) e da un testo (text), senza aggiungere molto
 * di più alla classe astratta che implementa se non il costruttore e l'implementazione dei metodi astratti.
 *
 * @author Giorgia
 * @package Commons
 */
class SimpleMessage extends Message
{

    /**
     * Costruttore.
     *
     * @param string $type Tipo del messaggio.
     * @param string $text Testo del messaggio.
     */
    public function __construct($type, $text)
    {
        $this->setType($type);
        $this->setText($text);
    }

    /**
     * Magic method __toString().
     *
     * @return string
     */
    public function __toString()
    {
        return "$this->getType() - $this->getText()";
    }

    /**
     * Magic method __debugInfo().
     *
     * @return string
     */
    public function __debugInfo()
    {
        return "Message - Type: $this->getType() - Text: $this->getText()";
    }
}
