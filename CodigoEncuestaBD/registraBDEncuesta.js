function registraBDEncuesta (encuesta){ 
    console.log ( "Entro en registraBDEncuesta.js")
            
    const encuesta = {
        "idUsuario": 4,
        "titulo": "",
        "fechaInicio":"",
        "fechaFin": "",
        "Opcion1": "",
        "Opcion2": "",
        "Opcion1": "",
        "Opcion1": "",
    
    };
    const update = {data:[]};
    update.data.push(encuesta);
    
    dataSon = JSON.stringify(data);
    console.log (dataSon);

    
    const options = {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
            };
        
    const enviar = async () => {
        
            
            try {
                    let response = await fetch("updateEncuesta.php", {
                        method: "POST",
                        cache: "no-cache",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(data)
                    });
                    if (response.ok) {
                        console.log(response);
                        const rta2 = await response.json();
                        console.log(rta2);
                    }
                    else {
                        throw new Error(response.statusText);
                    }
                } catch (err) {
                    console.log("Error al realizar la petición AJAX: " + err.message);
                }
            }
        enviar();
};
   

function upSubscripciones(user){

    console.log("Hola" + user);
    console.log(" estoy en pruebas ");
    let $idSubscriptor = user + "";
    console.log ($idSubscriptor);
    const checkboxes = document.getElementsByName("checkBox");
    let $idsiguiendoA = "";
    let $existe_dupla = ""; 

    const update = {data:[]};

    checkboxes.forEach(item => {
        $idsiguiendoA = item.value
        const $activa = item.checked ? "1" : "0";
        $existe_dupla = item.previousElementSibling.innerHTML 

        const arrayItem = {
            subscriptor: $idSubscriptor,
            siguiendoA: $idsiguiendoA,
            activa: $activa,
            existe_dupla: $existe_dupla
            };
        update.data.push(arrayItem);
        
        });

        console.log(update);
        const options = {
            method: 'POST',
            cache: 'no-cache',
            headers: {'Content-Type': 'application/json',},
            body: JSON.stringify(update),
        };
        
        const enviar = async () => {
            try {
                const response = await fetch('updateSubscripciones.php', options);
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
