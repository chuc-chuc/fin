if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#search-table", {
        searchable: true,
        sortable: true,
        locale: "es-GT",
    });
}

//<!DOCTYPE html>
// JavaScript para manejar eventos del modal de bobeda
const abrirModal = document.getElementById('abrirModal');
const cerrarModal = document.getElementById('cerrarModal');
const modal = document.getElementById('miModal');
const formulario = document.getElementById('bodega');

// Función para abrir el modal
abrirModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

// Función para cerrar el modal
cerrarModal.addEventListener('click', () => {
    modal.classList.add('hidden');
    formulario.reset();
});

// Función para cerrar el modal al hacer clic fuera del contenido o el título
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.classList.add('hidden');
        formulario.reset();
    }
});

// funcion para validar bobeda de caja
document.getElementById('efectivoDisplay').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
});


// solicitudes de bobeda
$(document).ready(function () {
    $('#efectivoDisplay').on('blur', function () {
        var value = this.value.replace(/,/g, '');
        if (!value) {
            return;
        }

        // Comprobar si el valor es un número válido
        if (!isNaN(parseFloat(value)) && isFinite(value)) {
            // Convertir a número para descartar ceros a la izquierda
            var numericValue = parseFloat(value);
            // Volver a formatear y añadir ceros finales si es necesario
            this.value = new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            }).format(numericValue);
        } else {
            // Si no es un número, limpiar el campo
            this.value = '';
            alert('Por favor, ingresa un número válido.');
        }
    });

    $('#bodega').submit(function (e) {
        e.preventDefault();

        // Crear un nuevo objeto FormData
        var formData = new FormData(this);

        // Agregar el campo efectivo desformateado al objeto FormData
        var efectivoValue = $('#efectivoDisplay').val().replace(/,/g, '');
        formData.append('efectivo', efectivoValue);
        //alert(efectivoValue);

        $.ajax({
            url: 'caja.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                console.log(response);
                //alert('Formulario enviado correctamente. Respuesta del servidor: ' + response);
                if (response == 'Listo') {
                    $("#cerrarModal").click();
                    Swal.fire({
                        icon: "success",
                        title: "Operación Realizada",
                        text: "Espere la confirmacion del encargado de bodega",
                        tshowConfirmButton: false,
                        timer: 3500
                    });
                    cargarTransacciones();
                } else {
                    Swal.fire({
                        icon: "error",
                        title: response,
                        tshowConfirmButton: true
                    });
                }
            },
            error: function (xhr, status, error) {
                alert('Ha ocurrido un error: ' + error);
            }
        });
    });
});


// Función para cargar las transacciones en la tabla
let currentDataTable = null;

function cargarTransacciones() {
    // Objeto con los datos a enviar al servidor
    const metodo = 'pedidos';
    const datos = {
        metodos: metodo
    };

    $.ajax({
        url: 'servicio.php',
        type: 'POST',
        dataType: 'json',
        data: datos,
        success: function (data) {
            console.log(data);
            // Limpiar tabla antes de agregar datos nuevos
            $('#tablaTransacciones tbody').empty();

            // Iterar sobre los datos recibidos y agregar filas a la tabla
            $.each(data, function (index, transaccion) {
                var fila = '<tr>' +
                    '<td>' + transaccion.nombre + '</td>' +
                    '<td>' + transaccion.monto + '</td>' +
                    '<td>' + transaccion.boleta + '</td>' +
                    '<td>' + transaccion.fechaHora + '</td>' +
                    '<td>' + transaccion.estado + '</td>' +
                    '</tr>';
                $('#tablaTransacciones tbody').append(fila);
            });

            // Reinicializar DataTable después de cargar los datos
            reinicializarDataTable();
        },
        error: function (xhr, status, error) {
            console.error(error);
            alert('Error al cargar las transacciones. Inténtalo de nuevo.');
        }
    });
}

function reinicializarDataTable() {
    const tabla = document.getElementById("tablaTransacciones");

    if (!tabla || typeof simpleDatatables === 'undefined') {
        return;
    }

    // Destruir la instancia actual si existe
    if (currentDataTable) {
        currentDataTable.destroy();
        currentDataTable = null;
    }

    // Crear nueva instancia
    currentDataTable = new simpleDatatables.DataTable("#tablaTransacciones", {
        searchable: true,
        sortable: false
    });
}

// Inicialización al cargar la página
$(document).ready(function () {
    cargarTransacciones();
    reinicializarDataTable();
});

//datatables de la tabla:
