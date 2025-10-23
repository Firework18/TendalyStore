import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css"

Dropzone.autoDiscover = false;

//Imagen negocio
const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png,.jpg,.jpeg",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles:1,
    uploadMultiple: false
})

//Imagen Producto