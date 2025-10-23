import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css"

Dropzone.autoDiscover = false;

//Imagen negocio
const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png,.jpg,.jpeg",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles:3,
    uploadMultiple: false
})

dropzone.on('sending',function(file,xhr,formData){
    console.log(formData);
})

dropzone.on('success',function(file,response){
    console.log(response);
})

dropzone.on('error',function(file,message){
    console.log(message);
})

dropzone.on('removedfile',function(file,message){
    console.log('Archivo Eliminado');
})

//Imagen Producto