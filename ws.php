<?php
require_once "lib/nusoap/lib/nusoap.php";

function InfoPrato($id)
{
    $dbhost="appserver-01.alunos.di.fc.ul.pt";
	$dbuser="asw001";	$dbpass="aswAGR2020";	$dbname="asw001";
	//Cria a ligação à BD
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	//Verifica a ligação à BD
	if(mysqli_connect_error()){die("Database connection failed: ".mysqli_connect_error());}

    $sql = "SELECT dishName, vendor, price, ingredients FROM quikChef_plates WHERE id_plate=" . $id;
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (empty($row)) {
        $html[]="<tr><td>Where's no plate with the id $id </td></tr>";
    
    } else {
        $html[]="<tr><td>Nome: </td><td>" . $row["dishName"] . "</td></tr>";
        $html[]="<tr><td>Vendedor: </td><td>" . $row["vendor"] . "</td></tr>";
        $html[]="<tr><td>Preço: </td><td>" . $row["price"] . "€</td></tr>";
        $html[]="<tr><td>Ingredientes: </td><td>" . $row["ingredients"] . "</td></tr>";
    }

    $html="<table>".implode("\n", $html)."</table>";
    
    mysqli_close($conn);
	return $html;
}

function RealizaCompra($id_prato, $user, $password)
{
    $dbhost="appserver-01.alunos.di.fc.ul.pt";
	$dbuser="asw001";	$dbpass="aswAGR2020";	$dbname="asw001";
	//Cria a ligação à BD
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	//Verifica a ligação à BD
	if(mysqli_connect_error()){die("Database connection failed: ".mysqli_connect_error());}

    $query = "SELECT passwd, balance FROM quikChef_user WHERE username='$user'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['passwd'])) {
        $balance = $row["balance"];

        $sql = "SELECT dishName, price, vendor, numberPlates FROM quikChef_plates WHERE id_plate=" . $id_prato;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 0) {
            $html[]="<tr><td>Resposta: </td><td>Não aceite</td></tr>";
            $html="<table>".implode("\n", $html)."</table>";
    
            mysqli_close($conn);
            return $html;

        } else {
            $dish = $row["dishName"];
            $price = $row['price'];
            $vendor = $row['vendor'];
            $num_plates = $row['numberPlates'];
            $new_num_plates = $num_plates - 1;
            $user_balance = $balance - $price;

            if ($user_balance > 0) {
                $update_user = "UPDATE quikChef_user SET balance='$user_balance' WHERE username='$user'";
                mysqli_query($conn, $update_user);

                $update_history = "INSERT INTO quikChef_history(vendor, dishName, buyer) VALUES ('$vendor', '$dish', '$user')";
                mysqli_query($conn, $update_history);

                if ($new_num_plates > 0) {
                    $update_plate = "UPDATE quikChef_plates SET numberPlates='$new_num_plates' WHERE dishName='$dish'";
                    mysqli_query($conn, $update_plate);
                
                } else {
                    if ($new_num_plates == 0) {
                        $updatePlate = "DELETE FROM quikChef_plates WHERE dishName='$dish'";
                        mysqli_query($conn, $updatePlate);
                    
                    } else {
                        $html[]="<tr><td>Resposta: </td><td>Não aceite</td></tr>";
                        $html="<table>".implode("\n", $html)."</table>";
                
                        mysqli_close($conn);
                        return $html;
                    }
                }

                $html[]="<tr><td>Resposta: </td><td>Aceite</td></tr>";
                $html="<table>".implode("\n", $html)."</table>";

                mysqli_close($conn);
                return $html;

            } else {
                $html[]="<tr><td>Resposta: </td><td>Não aceite</td></tr>";
                $html="<table>".implode("\n", $html)."</table>";
        
                mysqli_close($conn);
                return $html;
            }   
        }
        
    } else {
        $html[]="<tr><td>Resposta: </td><td>Não aceite</td></tr>";
        $html="<table>".implode("\n", $html)."</table>";

        mysqli_close($conn);
        return $html;
    }
}

$server = new soap_server();
$server->configureWSDL('cumpwsdl', 'urn:cumpwsdl');

$server->register("InfoPrato",
    array('id' => 'xsd:integer'),
    array('return' => 'xsd:string'),
    'uri:cumpwsdl', // namespace
    'urn:cumpwsdl#InfoPrato', // SOAP Action
    'rpc', //estilo
    'encoded' // uso
);

$server->register("RealizaCompra",
    array('id_prato' => 'xsd:integer', 'user' => 'xsd:string', 'password' => 'xsd:string'),
    array('return' => 'xsd:string'),
    'uri:cumpwsdl', // namespace
    'urn:cumpwsdl#RealizaCompra', // SOAP Action
    'rpc', //estilo
    'encoded' // uso
);

@$server->service(file_get_contents("php://input"));

?>