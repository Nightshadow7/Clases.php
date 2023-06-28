//de debe cambiar la ruta "ArTeM02-065/php" por el parametro en cada caso y crear una carpeta llamada campuslands en donde ahi se alojan los archivos

//parametro en Artemist --ArTeM02-065/php--
//parametro en un pc de campus --SkylAb-107--


//se usa el parametro para artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=getAll--
const urlCamper = "http://localhost/SkylAb-107/campusland/backend/campers/campercontroller.php?op=getAll";

//se usa para el parametro artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=insert--
const urlnewCamper = "http://localhost/SkylAb-107/campusland/backend/campers/campercontroller.php?op=insert";

const urlDeleteCamper = "http://localhost/SkylAb-107/campusland/backend/campers/campercontroller.php?op=delete";


export const getCamper =  async () => {
  try {
    const camper = await fetch(urlCamper);
    const datosCamper = await camper.json(
      );
    return datosCamper;
  } catch (error) {
    console.log(error);
  }
}
export const newCamper = async (registro) => {
  try {
    await fetch(urlnewCamper,{
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

export const deleteCamper = async idCamper => {
  try {
    await fetch(`${urlDeleteCamper}&id=${idCamper}`,{
      method:'DELETE',
    });
  } catch (error) {
    console.log(error);
  }
}