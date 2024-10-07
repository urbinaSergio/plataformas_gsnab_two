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
        errorMessage.textContent = 'Por favor, ingrese un número de documento.';
        return;
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
            // Llenar la tabla con los datos del estudiante
            for (const [key, value] of Object.entries(responseData.data)) {
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
            errorMessage.textContent = 'No se encontró información.';
        }
    } catch (error) {
        console.error('Error al enviar datos a la API:', error);
        errorMessage.textContent = 'Error al consultar el estudiante.';
    }
});
