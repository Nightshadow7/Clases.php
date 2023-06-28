//se usa el parametro para artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=getAll--
const urlRegion = "http://localhost/ArTeM02-065/php/campuslands/backend/region/regioncontroller.php?op=getAll";
//se usa para el parametro artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=insert--
const urlnewRegion = "http://localhost/ArTeM02-065/php/campuslands/backend/region/regioncontroller.php?op=insert";

const urlDeleteRegion = "http://localhost/ArTeM02-065/php/campuslands/backend/region/regioncontroller.php?op=delete";


export const getRegion =  async () => {
  try {
    const region = await fetch(urlRegion);
    const datosRegion = await region.json(
      );
    return datosRegion;
  } catch (error) {
    console.log(error);
  }
}
export const newRegion = async (registro) => {
  try {
    await fetch(urlnewRegion,{
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

export const deleteRegion = async idRegion => {
  try {
    await fetch(`${urlDeleteRegion}&id=${idRegion}`,{
      method:'DELETE',
    });
  } catch (error) {
    console.log(error);
  }
}