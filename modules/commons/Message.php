<?php
/**
 * Message.php
 */
namespace Commons;

use Commons\StringUtility;

/**
 * La classe astratta Message serve per rappresentare un messaggio.
 *
 * Un Message deve essere almeno rappresentato da un tipo (type) e da un testo (text). Il tipo è forzato ad essere
 * uno qualunque tra quelli ammessi, mentre il testo è forzato ad essere una Strict String (si vuole che un messaggio
 * abbia un testo comprensibile). Se il testo passato al getter non è una Strict String, viene usato il testo di default.
 *
 * Elenco tipi standard (il cui significato è banale):
 * - UNDEFINED
 * - INFO
 * - WARNING
 * - ERROR
 * - DEBUG
 *
 * @see Commons\StringUtility Per la definizione di Strict String.
 *
 * @author Giorgia
 * @package Commons
 */
abstract class Message
{

    /**
     * @var string $TYPE_UNDEFINED Tipo non definito.
     */
    public static $TYPE_UNDEFINED = 'UNDEFINED';

    /**
     * @var string $TYPE_INFO Tipo info.
     */
    public static $TYPE_INFO = 'INFO';

    /**
     * @var string $TYPE_WARNING Tipo warning.
     */
    public static $TYPE_WARNING = 'WARNING';

    /**
     * @var string $TYPE_ERROR Tipo errore.
     */
    public static $TYPE_ERROR = 'ERROR';

    /**
     * @var string $TYPE_DEBUG Tipo da utilizzare in sviluppo o per debug.
     */
    public static $TYPE_DEBUG = 'DEBUG';

    /**
     * @var string Tipo di default.
     */
    private $default_type = self::TYPE_UNDEFINED;

    /**
     * @var string Testo di default.
     */
    private $default_text = 'undefined';

    /**
     * @var string Tipo messaggio.
     */
    private $type;

    /**
     * @var string Testo messaggio.
     */
    private $text;

    /**
     * Setter del tipo. Se il tipo passato non è tra quelli ammessi nella classe, viene utilizzato il tipo di default.
     *
     * @param string $type Tipo messaggio.
     */
    final public function setType($type)
    {
        $this->type = $this->getValidType($type);
    }

    /**
     * Setter del testo. Se il testo passato non è una Strict String, viene utilizzato il testo di default.
     *
     * @param string $text Testo del messaggio.
     * @see StringUtility Per la definizione di Strict String.
     */
    final public function setText($text)
    {
        $this->text = StringUtility::ifStrictString($text, $this->default_text);
    }

    /**
     * Getter del tipo.
     *
     * @return string
     */
    final public function getType()
    {
        return $this->type;
    }

    /**
     * Getter del testo.
     *
     * @return string
     */
    final public function getText()
    {
        return $this->text;
    }

    /**
     * Controlla il tipo passato e se non è tra quelli ammessi dalla classe, restituisce il tipo di default.
     *
     * @param string $type Tipo da controllare.
     * @return string Tipo corretto da utilizzare per il Message.
     */
    private function getValidType($type)
    {
        switch ($type) {
            case self::TYPE_INFO : return $type;
            case self::TYPE_WARNING : return $type;
            case self::TYPE_ERROR : return $type;
            case self::TYPE_DEBUG : return $type;
            default: return $this->default_type;
        }
    }

    /**
     * Indica se l'istanza di Message è di tipo UNDEFINED.
     *
     * @return boolean True se il tipo è UNDEFINED, false altrimenti.
     */
    final public function isUndefinedType()
    {
        return $this->getType() === self::TYPE_UNDEFINED;
    }

    /**
     * Indica se l'istanza di Message è di tipo WARNING.
     *
     * @return boolean True se il tipo è WARNING, false altrimenti.
     */
    final public function isWarningType()
    {
        return $this->getType() === self::TYPE_WARNING;
    }

    /**
     * Indica se l'istanza di Message è di tipo ERROR.
     *
     * @return boolean True se il tipo è ERROR, false altrimenti.
     */
    final public function isErrorType()
    {
        return $this->getType() === self::TYPE_ERROR;
    }

    /**
     * Indica se l'istanza di Message è di tipo DEBUG.
     *
     * @return boolean True se il tipo è DEBUG, false altrimenti.
     */
    final public function isDebugType()
    {
        return $this->getType() === self::TYPE_DEBUG;
    }

    /**
     * Il magic method è chiamato da varie funzioni come echo e print, va introdotto per debug.
     *
     * @return string
     */
    abstract public function __toString();

    /**
     * Il magic method è chiamato dal var_dump, va introdotto per debug.
     *
     * @return string
     */
    abstract public function __debugInfo();
}
