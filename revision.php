<?php  
    if (isset($_POST['continuar'])){
		$resultado_continuar = $_POST['opcion'];
		
        if ($resultado_continuar == 1) {
            echo "<br><a href='reservaciones.html'> Click para continuar...</a>";
        }elseif ($resultado_continuar == 2) {
            echo "<br><br><a href='busquedas.html'> Click para continuar...</a>";
        }   
        
	}

    if (isset($_POST['confirmar_reserva'])) {
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $personas = $_POST['personas'];
        $area = $_POST['area'];
        switch ($area) {
            case '1':
                $area_elegida = "Terraza";
                break;
            case '2':
                $area_elegida = "Bar";
            case '3':
                $area_elegida = "Zona_Familiar";
            case '4':
                $area_elegida = "Cualquiera";
            default:
                # code...
                break;
        }
        
        $archivo = "reservaciones.txt";
        $textoAguardar = $nombre."|".$fecha."|".$hora."|".$personas."|".$area_elegida."|"."\n";
        $archivoManipulable = fopen($archivo, "a+");
		fwrite($archivoManipulable, $textoAguardar);
		fclose($archivoManipulable);

        echo "Reservacion exitosa <br><a href='menumain.html'> Regresar al menu principal...</a>";
    }
    if (isset($_POST['buscar_reserva'])) {
        
        $archivo = file_get_contents("reservaciones.txt");
        $nombre_a_buscar = $_POST['nombrebuscar'];
        $archivoManipulable = strpos($archivo, $nombre_a_buscar);

        if ($archivoManipulable === false) {
            echo "No existe reservacion para '$nombre_a_buscar' Pruebe haciendo la reservacion";
        } else {
            echo "Felicidades '$nombre_a_buscar' Ya tienes una reservacion con nosotros :D";
        }
    }
    

    
    
?>