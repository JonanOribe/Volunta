        <?php
      
        require_once("./php/database.php");
            
            echo "<h3>LISTADO PERSONAS</h3>";
            
                       
           $personas = listarPersonas($con);
            
            if(count($personas) == 0){
                echo "<br/>No hay personas<br/>";
            }
            else{
                echo "<table border='1'>
                        <tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td><td>TELÉFONO</td><td>DIRECCIÓN</td><td>CIUDAD</td><td>EMAIL</td></tr>";
                foreach($personas as $persona){
                    echo "<tr>
                            <td>".$persona['dni']."</td>
                            <td>".$persona['nombre']."</td>
                            <td>".$persona['apellidos']."</td>
                        </tr>";
                }
                echo "</table>";
            }
            
            cerrarConexion($con);
            
        ?>
