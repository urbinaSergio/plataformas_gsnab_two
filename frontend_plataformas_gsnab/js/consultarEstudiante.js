document.getElementById("aceptar_terminos").addEventListener('change', checkAccepted);


function checkAccepted(event) {
    var btnEnviar = document.getElementById("consultarButton");
    console.log(this.checked);


    var isNotChecked = !this.checked;
    btnEnviar.disabled = isNotChecked;
}

//se debe validar primero el cheoukt y luego el boton de enviar formulario en la logica de abajo


document.getElementById('consultarButton').addEventListener('click', async () => {
    const numeroDocumento = document.getElementById('numeroDocumento').value;
    const errorMessage = document.getElementById('errorMessage');
    const resultTable = document.getElementById('resultTable');
    const resultBody = document.getElementById('resultBody');







    // Limpiar resultados anteriores
    errorMessage.textContent = '';
    resultBody.innerHTML = '';
    resultTable.style.display = 'none';

    if (!numeroDocumento) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Ingresa un número de documento",

        });
        return;
    }

    //validación del check out en la aceptación de terminos de condiciones antes del boton de enviar.
    if (!document.getElementById("aceptar_terminos").checked) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Debes aceptar los términos y condiciones.",
        });
        return;  // Salir si el checkbox no está marcado
    }

    const jsonData = JSON.stringify({ numero_documento: numeroDocumento });


    try {
        const response = await fetch('http://localhost/usuarios_plataformas_gsnab/apirest/consultar/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: jsonData,
        });

        if (!response.ok) {
            throw new Error('Error en la llamada a la API: ' + response.statusText);
        }

        const responseData = await response.json();

        if (responseData.status === "success") {

            let modifiedData = {};

            Object.keys(responseData.data).forEach(key => {
                let newKey = key;

                // Aquí defines las claves que deseas cambiar
                if (key === 'nombre_estudiante') {
                    newKey = 'Student Name';
                } else if (key === 'numero_identificacion') {
                    newKey = 'ID Number';
                } else if (key === 'nombre_curso') {
                    newKey = 'Group';
                } else if (key === 'nombre_estado') {
                    newKey = 'State';
                } else if (key === 'user_ARUKAY') {
                    newKey = 'User: ARUKAY';
                } else if (key === 'password_ARUKAY') {
                    newKey = 'Password: ARUKAY';
                } else if (key === 'user_FATHOM_CAMBRIDGE') {
                    newKey = 'User: CAMBRIDGE';
                } else if (key === 'password_CAMBRIDGE') {
                    newKey = 'Password: CAMBRIDGE';
                } else if (key === 'user_DELFOS') {
                    newKey = 'User: DELFOS';
                } else if (key === 'password_DELFOS') {
                    newKey = 'Password: DELFOS';
                } else if (key === 'user_FATHOM_READS') {
                    newKey = 'User: FATHOM READS';
                } else if (key === 'password_FATHOM_READS') {
                    newKey = 'Password: FATHOM READS ';
                } else if (key === 'user_MILTON_OCHOA') {
                    newKey = 'user: MILTON OCHOA';
                } else if (key === 'password_MILTON_OCHOA') {
                    newKey = 'Password: MILTON OCHOA';
                }

                // Asignar el valor con la nueva clave
                modifiedData[newKey] = responseData.data[key];
            });

            console.log(modifiedData);

            // Llenar la tabla con los datos del estudiante
            for (const [key, value] of Object.entries(modifiedData)) {
                const row = document.createElement('tr');
                const cellKey = document.createElement('td');
                const cellValue = document.createElement('td');

                cellKey.textContent = key;
                cellValue.textContent = value;

                row.appendChild(cellKey);
                row.appendChild(cellValue);
                resultBody.appendChild(row);
            }
            resultTable.style.display = 'table'; // Mostrar la tabla
        } else {

            Swal.fire({
                icon: "error",
                title: "No se encontró información",
                text: "Verifica que el documento del estudiante este correcto."

            });
        }
    } catch (error) {
        console.error('Error al enviar datos a la API:', error);
        errorMessage.textContent = 'Error al consultar el estudiante.';
    }
});
