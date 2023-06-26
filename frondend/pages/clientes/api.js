const urlClientes = "http://localhost/ArTeM02-065/clase2/backend/controller.php?op=getAll";
const urlnewClientes = "http://localhost/ArTeM02-065/clase2/backend/controller.php?op=insert";

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
    await fetch(urlnewCliente,{
      method:'post',
      body: JSON.stringify(registro),
      headers:{
        'Content-Type': 'application/json'
      }
  });
  } catch (error) {
    console.log(error)
  }
}