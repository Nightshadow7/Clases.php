// const url ="http://localhost:3000/campers";
const url ="http://localhost/ArTeM02-065/php/apiRest/backend/controlers/campers.php?op=GetAll"; 


//2 obetenere Todos los Campers de la API -(GET)


export const getCampers = async () =>{
    try {
        const result = await fetch(url)
        const campers = await result.json();
        return campers
    } catch (error) {
        console.log(error);
    }
}


// registrar unnuevo campers en al res API -metodo  HTTP POST -

export const newCamper = async camper => {
    console.log(camper);
    try {
        await fetch(url,{
            method: 'POST',
            body: JSON.stringify(camper),
            headers: {
                'Content-Type': 'application/json'
        }

        });
        window.location.href ="index.html"

        
    } catch (error) {
        console.log(error);
    }
}

//Eliminar campers - metodo HTTP (DELETE)

export const adeleteCampers= async id=>{
        try {   
            await fetch (`${url}/${id}`,{
                method: 'DELETE'
            })
        } catch (error) {
            console.log(error);
        }

}
