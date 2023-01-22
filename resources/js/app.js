import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

let inputImg = document.querySelector('[name="imagen"]');

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (inputImg.value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 123;
            imagenPublicada.name = inputImg.value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on("success", function (file, response) {
    inputImg.value = response.imagen;
});

dropzone.on("removedfile", function () { });

dropzone.on("removedfile", () => {
    inputImg.value = '';
});