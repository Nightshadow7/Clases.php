//de debe cambiar la ruta "ArTeM02-065/php" por el parametro en cada caso y crear una carpeta llamada campuslands en donde ahi se alojan los archivos

//parametro en Artemist --ArTeM02-065/php--
//parametro en un pc de campus --SkylAb-107--


//se usa el parametro para artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=getAll--
const urlDepartamento = "http://localhost/SkylAb-107/campusland/backend/departamento/departamentocontroller.php?op=getAll";

//se usa para el parametro artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=insert--
const urlnewDepartamento = "http://localhost/SkylAb-107/campusland/backend/departamento/departamentocontroller.php?op=insert";

const urlDeleteDepartamento = "http://localhost/SkylAb-107/campusland/backend/departamento/departamentocontroller.php?op=delete";


export const getDepartamento =  async () => {
  try {
    const departamento = await fetch(urlDepartamento);
    const datosDepartamento = await departamento.json(
      );
    return datosDepartamento;
  } catch (error) {
    console.log(error);
  }
}
export const newDepartamento = async (registro) => {
  try {
    await fetch(urlnewDepartamento,{
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

export const deleteDepartamento = async idDepartamento => {
  try {
    await fetch(`${urlDeleteDepartamento}&id=${idDepartamento}`,{
      method:'DELETE',
    });
  } catch (error) {
    console.log(error);
  }
}