//se usa el parametro para artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=getAll--
const urlClientes = "http://localhost/SkylAb-107/node/backend/controller.php?op=getAll";
//se usa para el parametro artemist --http://localhost/ArTeM02-065/clase2/backend/controller.php?op=insert--
const urlnewClientes = "http://localhost/SkylAb-107/node/backend/controller.php?op=insert";

const urlDeleteClientes = "http://localhost/SkylAb-107/node/backend/controller.php?op=delete";


export const getClientes =  async () => {
  try {
    const clientes = await fetch(urlClientes);
    const datosClientes = await clientes.json(
      );
    return datosClientes;
  } catch (error) {
    console.log(error);
  }
}
export const newCliente = async (registro) => {
  try {
    await fetch(urlnewClientes,{
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

export const deleteCliente = async idCliente => {
  try {
    await fetch(`${urlDeleteClientes}&id=${idCliente}`,{
      method:'DELETE',
    });
  } catch (error) {
    console.log(error);
  }
}