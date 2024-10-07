document.getElementById('convertButton').addEventListener('click', async () => {
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];

    if (file) {
        const loadingBar = document.getElementById('loadingBar');
        loadingBar.style.display = 'block'; // Mostrar la barra de carga

        try {
            // Simular un proceso de carga
            for (let i = 0; i <= 100; i++) {
                loadingBar.value = i; // Actualiza el valor de la barra de carga
                await new Promise(resolve => setTimeout(resolve, 20)); // Simula un pequeño retardo
            }

            const base64 = await convertFileToBase64(file);
            const base64Content = base64.split(',')[1]; // Elimina el prefijo MIME
            const jsonResult = JSON.stringify({ excel: base64Content });
            //document.getElementById('result').textContent = jsonResult;

            // Llamada a la API para enviar el JSON
            await uploadToApi(jsonResult);
        } catch (error) {
            console.error('Error al convertir el archivo:', error);
            document.getElementById('result').textContent = 'Error al convertir el archivo';
        } finally {
            loadingBar.style.display = 'none'; // Ocultar la barra de carga al final
        }
    } else {
        document.getElementById('result').textContent = 'Por favor, selecciona un archivo primero.';
    }
});

function convertFileToBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
    });
}

async function uploadToApi(jsonData) {
    try {
        const response = await fetch('http://localhost/usuarios_plataformas_gsnab/apirest/subir/', {
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
        console.log('Respuesta de la API:', responseData);


        document.getElementById('result').textContent = 'Archivo cargado exitosamente: ';// + JSON.stringify(responseData);
    } catch (error) {
        console.error('Error al enviar datos a la API:', error);
        document.getElementById('result').textContent = 'Error al enviar datos a la API';
    }
}
