<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

require_once "lib/nusoap/lib/nusoap.php";
$client = new nusoap_client('http://appserver-01.alunos.di.fc.ul.pt/~asw001/QuikChef/ws.php?wsdl', true);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Web Services Client</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid" id="ws-wrapper">
        <h1>Web Services Client</h1>
        <br><br>

        <div class="row">
            <div class="col-sm-6">
                <div class="container-fluid" id="ip-wrapper">
                    <h2>InfoPrato Web Service</h2>

                    <form action="" method=POST>
                        <div class="form-group">
                            <label for="input_id">Plate id</label>
                            <input type="text" class="form-control" id="input_id" name="id" placeholder="Enter plate id" required />
                        </div>
                        <br>
                        <button type="submit" name="submit_IP" class="btn btn-primary">Submit</button>
                    </form>

                    <div class="container-fluid" id="ip-response">
                        <h4>
                        <?php
                        if (isset($_POST['submit_IP'])) {
                            $result = $client->call("InfoPrato", array('id' => $_POST['id']));

                            if ($client->fault) {
                                echo "<strong>Fault: </strong>" . print_r($callResult);
                                
                            } else {
                                $error = $client->getError();
                                if ($error) {
                                    echo "<strong>Error: </strong>" . $error;

                                } else {
                                    echo '<br><p>Result:</p><pre>'; print_r($result); echo '</pre>';
                                }
                            }
                        }

                        ?>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="container-fluid" id=rc-wrapper">
                    <h2>RealizaCompra Web Service</h2>

                    <form action="" method=POST>
                        <div class="form-group">
                            <label for="input_user">Username</label>
                            <input type="text" class="form-control" id="input_user" name="user" placeholder="Enter username" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="input_passwd">Password</label>
                            <input type="password" class="form-control" id="input_passwd" name="passwd" placeholder="Enter password" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="input_id">Plate id</label>
                            <input type="text" class="form-control" id="input_id" name="id_plate" placeholder="Enter plate id" required />
                        </div>
                        <br>
                        <button type="submit" name="submit_RC" class="btn btn-primary">Submit</button>
                    </form>

                    <div class="container-fluid" id="rc-response">
                        <h4>
                        <?php
                        if (isset($_POST['submit_RC'])) {
                            $result = $client->call("RealizaCompra", array('id_prato' => $_POST['id_plate'], 'user' => $_POST['user'], 'password' => $_POST['passwd']));

                            if ($client->fault) {
                                echo "<strong>Fault: </strong>" . print_r($callResult);
                            } else {
                                $error = $client->getError();
                                if ($error) {
                                    echo "<strong>Error: </strong>" . $error;

                                } else {
                                    print_r($result);
                                }
                            }
                        }

                        ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>