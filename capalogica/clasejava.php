<?php
include './capadatos/conexion.php';

// Función para obtener módulos y videos
function obtener_modulos_videos() {
    global $conn;
    $sql_modulos = "SELECT m.id_modulo, m.nomb_mod, m.tema_mod, m.des_mod, v.titulo_corto, v.url, v.id_videos 
                    FROM modulos m
                    LEFT JOIN videos v ON m.id_modulo = v.id_modulo
                    ORDER BY m.id_modulo";
    $result_modulos = $conn->query($sql_modulos);
    
    return $result_modulos;
}
?>
