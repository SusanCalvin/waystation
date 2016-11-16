<?php
/**
 * @author Giorgia
 */
spl_autoload_register(null, false);

spl_autoload_extensions('.php');

/**
 * Semplicissimo auto loader delle classi, solo per i test.
 *
 * @param string $className
 * @return boolean
 */
function libLoader($className)
{
    $arr = explode("\\", $className);

    array_walk($arr, function(&$value) {
        $value = lcfirst($value);
    });

    $filename = implode("\\", $arr) . '.php';
    $file = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $filename;

    if (!file_exists($file) || !is_readable($file)) {
        return false;
    }

    include_once $file;
    return true;
}
spl_autoload_register('libLoader');
