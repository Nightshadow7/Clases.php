//se usa el parametro para artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=getAll--
const urlDepartamento = "http://localhost/ArTeM02-065/php/campuslands/backend/departamento/departamentocontroller.php?op=getAll";
//se usa para el parametro artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=insert--
const urlnewDepartamento = "http://localhost/ArTeM02-065/php/campuslands/backend/departamento/departamentocontroller.php?op=insert";

const urlDeleteDepartamento = "http://localhost/ArTeM02-065/php/campuslands/backend/departamento/departamentocontroller.php?op=delete";


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