<?php
function compress_output()
{
    $CI = &get_instance();
    $buffer = $CI->output->get_output();

    // Minificar HTML eliminando espacios innecesarios
    $search = array(
        '/\>[^\S ]+/s',  // Eliminar espacios en blanco después de etiquetas
        '/[^\S ]+\</s',  // Eliminar espacios en blanco antes de etiquetas
        '/(\s)+/s'       // Eliminar múltiples espacios consecutivos
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );

    $buffer = preg_replace($search, $replace, $buffer);

    // Enviar la salida comprimida
    $CI->output->set_output($buffer);
    $CI->output->_display();
}
?>
