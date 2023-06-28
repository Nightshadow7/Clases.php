//de debe cambiar la ruta "ArTeM02-065/php" por el parametro en cada caso y crear una carpeta llamada campuslands en donde ahi se alojan los archivos

//parametro en Artemist --ArTeM02-065/php--
//parametro en un pc de campus --SkylAb-107--


//se usa el parametro para artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=getAll--
const urlPais = "http://localhost/SkylAb-107/campusland/backend/pais/paiscontroller.php?op=getAll";
//se usa para el parametro artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=insert--
const urlnewPais = "http://localhost/SkylAb-107/campusland/backend/pais/paiscontroller.php?op=insert";

const urlDeletePais = "http://localhost/SkylAb-107/campusland/backend/pais/paiscontroller.php?op=delete";


export const getPais =  async () => {
  try {
    const pais = await fetch(urlPais);
    const datosPais = await pais.json(
      );
    return datosPais;
  } catch (error) {
    console.log(error);
  }
}
export const newPais = async (registro) => {
  try {
    await fetch(urlnewPais,{
      method:'post',
      body: JSON.stringify(registro),
      headers:{
        'Content-Type': 'application/json'
      }
  });
  } catch (error) {
    console.log(error);
  }
}

export const deletePais = async idPais => {
  try {
    await fetch(`${urlDeletePais}&id=${idPais}`,{
      method:'DELETE',
    });
  } catch (error) {
    console.log(error);
  }
}