function registraBDEncuesta (){ 
    console.log ( "Entro en registraBDEncuesta.js")
    
    const update = {data:[]};
    update.data.push(window.encuesta);
    console.log(update);
        
    dataSon = JSON.stringify(update);
    console.log (dataSon);

      
    const options = {
        method: 'POST',
        cache: 'no-cache',
        headers: {'Content-Type': 'application/json',},
        body: JSON.stringify(update),
    };

    const enviar = async () => {
        try {
            const response = await fetch('registrBDEncuesta.php', options);
            if (response.ok) { // Verificar si la respuesta es exitosa
                const resultado = await response.json();
                console.log(resultado);}
            else {throw new Error(response.statusText);}
        } catch (error) {
            console.log("Error al realizar la petición AJAX: " + error.message);
        }
    };

    enviar();
};
