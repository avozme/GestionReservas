<?php

include("view.php");
include("models/security.php");
include("models/user.php");
include("models/resource.php");
include("models/timeTable.php");
include("models/reservation.php");

class ReservationController
{
    //******************************************************************************************************* */
    //-------------------------------------CONTROLADOR RESERVAS----------------------------------------
    //******************************************************************************************************* */


    private $view, $user, $reservation, $resource, $timeTable;

    /**
     * Constructor. Crea el objeto vista y los modelos
     */
    public function __construct()
    {
        session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->reservation = new Reservation();
        $this->resource = new Resource();
        $this->timeTable = new TimeTable();
    }



    // --------------------------------- MOSTRAR LISTA DE FRANJAS ----------------------------------------

    public function mostrar()
    {
        $id = $_SESSION["idUser"];
        $data['listaReservation'] = $this->reservation->getAll();
        $data['idUsuario'] = $id;
        $this->view->show("reservation/mostrar", $data);
    }


    // --------------------------------- FORMULARIO INSERTAR CALENDARIO ----------------------------------------

    public function formularioInsertar()
    {
        if (Security::thereIsSession() == true) {
            $data["idRecurso"] = $_REQUEST["recurso"];
            $data["datosRecurso"] = $this->resource->get($data["idRecurso"]);
            $this->view->show('reservation/formularioInsertar', $data);
        } else {
            Security::noAccess();
        }
    }


    // --------------------------------- FORMULARIO INSERTAR PARTE 2 ----------------------------------------


    public function reservaPaso2()
    {
        if (Security::thereIsSession() == true) {
            $data['timeTable'] = $this->timeTable->getAll();
            $data['time2'] = $this->timeTable->getAvailable();
            $data["datosRecurso"] = $this->resource->get($_REQUEST["resource"]);
            $idUsuario = $_SESSION["idUser"];
            $this->view->show('reservation/formularioInsertar2', $data);
        } else {
            Security::noAccess();
        }
    }




    // --------------------------------- INSERTAR RECURSOS ----------------------------------------

    public function insertar()
    {

        $result = 0;

        if (Security::thereIsSession() == true) {

            $repetir_veces = $_REQUEST["repeat"];
            if ($repetir_veces == "") $repetir_veces = 1;

            for ($i = 0; $i < $repetir_veces; $i++) {
                $date = date_create($_REQUEST["date"]);
                date_add($date, date_interval_create_from_date_string("7 days"));
                $_REQUEST["date"] = date_format($date, "Y-m-d");
                if (count($this->reservation->getByDate($_REQUEST["date"], $_REQUEST["idTimeTable"], $_REQUEST["idResource"])) == 0) {
                    $result = $result + $this->reservation->insert();
                }
            }

            if ($result == $repetir_veces) {
                // Tenemos que averiguar que idUsuario se ha asignado a la incidencia que acabamos de insertar
                //$ultimoId = $this->timeTable->getLastId();
                $data['msjInfo'] = "Todas las reservas se han realizado con éxito";
            } else {
                // Si la insercion de la incidencia ha fallado, mostramos mensaje de error
                $data['msjError'] = "Alguna de las reservas no se ha podido realizar. Por favor, revise sus fechas e inténtelo de nuevo.";
            }


            $id = $_SESSION["idUser"];

            if ($_SESSION['type'] ==  "admin") {
                $data['listaReservation'] = $this->reservation->getAll();
            } else {
                $data['listaReservation'] = $this->reservation->get();
            }
            $data['idUsuario'] = $_SESSION["idUser"];

            $this->view->show("reservation/mostrar", $data);
        } else {
            Security::noAccess();
        }
    }

    // --------------------Elimina una Instalacion de la base de datos (petición por ajax)----------------------------

    public function borrarReservationAjax()
    {


        if (Security::thereIsSession() == true) {
            // Recuperamos el id de la Instalacion
            $id = $_REQUEST["id"];
            // Eliminamos la Instalacion de la BD
            $result = $this->reservation->delete($id);
            if ($result == 0) {
                // Error al borrar. Enviamos el código -1 al JS
                echo "-1";
            } else {
                $id = $_SESSION["idUser"];
                if ($_SESSION['type'] ==  "admin") {
                    $data['listaReservation'] = $this->reservation->getAll();
                } else {
                    $data['listaReservation'] = $this->reservation->get();
                }
                $this->view->show("reservation/mostrar", $data);
            }
        } else {
            echo "-1";
        }
    }

    // --------------------------------- FORMULARIO MODIFICAR RESOURCES ----------------------------------------

    public function formularioModificar()
    {
        if (Security::thereIsSession() == true) {

            $idUsuario = $_SESSION["idUser"];
            $id = $_REQUEST["id"];
            $data['reservation'] = $this->reservation->getModify($id);
            $this->view->show('reservation/formularioModificar', $data);
        } else {
            Security::noAccess();
        }
    }

    // --------------------------------- MODIFICAR Resources ----------------------------------------

    public function modificar()
    {

        if (Security::thereIsSession() == true) {

            //lanzamos la consulta pa la bd
            $result = $this->reservation->update();

            if ($result == 1) {
                // Si la modificación del libro ha funcionado, continuamos actualizando la tabla "escriben".
                $data['msjInfo'] = "Reserva actualizada con éxito";
            } else {
                $data['msjError'] = "Error al actualizar la Reserva";
            }
            $data['listaReservation'] = $this->reservation->getAll();
            $this->view->show("reservation/mostrar", $data);
        } else {
            Security::noAccess();
        }
    }

    // --------------------------------- BUSCAR Resources ----------------------------------------

    public function buscar()
    {
        // Recuperamos el texto de b�squeda de la variable de formulario
        $textoBusqueda = $_REQUEST["textoBusqueda"];
        // Lanzamos la búsqueda y enviamos los resultados a la vista de lista de incidencas
        $data['listaReservation'] = $this->reservation->busquedaAproximada($textoBusqueda);
        $data['msjInfo'] = "Resultados de la búsqueda: \"$textoBusqueda\"";
        $this->view->show("reservation/mostrar", $data);
    }

    // ---------------------------------- CAMBIAR VALOR DE ORDENACION RECURSOS--------------------------------

    public function tipoBusqueda()
    {
        // Recuperamos el texto de búsqueda de la variable de formulario
        $tipoBusqueda = $_REQUEST["tipoBusqueda"];
        // Lanzamos la búsqueda y enviamos los resultados a la vista de lista de incidencias
        $data['listaReservation'] = $this->reservation->getOrder($tipoBusqueda);
        $data['msjInfo'] = "Busquedas ordenadas por: \"$tipoBusqueda\"";
        $this->view->show("reservation/mostrar", $data);
    }
}
