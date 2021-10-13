<template>

<div>

<form @submit.prevent="upload">
<p class="po"> Simple Form Para subir cualquier Archivo </p>
<input @change="handleOnchange" type="file">

<button> Subir </button>
</form>

<form @submit.prevent="upload2">
<p class="po"> Simple Form que establece la medida a una imagen </p>
<input @change="handleOnchange" type="file">

<button> Subir </button>

</form>

<form @submit.prevent="upload3">
<p class="po"> Simple Form que establece la imagen en blanco y negro </p>
<input @change="handleOnchange" type="file">

<button> Subir </button>

</form>


<form @submit.prevent="upload4">
<p class="po"> Simple Form que valida desde el Servidor si el archivo es de formato imagen</p>
<input @change="handleOnchange" type="file">

<button> Subir </button>

</form>


</div>
</template>

<script>
export default {
    data:() => ({
      file: '',  
    }),
    methods: {
        handleOnchange(e) {
            this.file = e.target.files[0];
        },
        upload() {
            const formData = new FormData;
            formData.set('file', this.file);

            axios.post('http://127.0.0.1:8000/api/upload', formData);
        },
        upload2() {
            const formData = new FormData;
            formData.set('file', this.file);

            axios.post('http://127.0.0.1:8000/api/upload_resize', formData);
        },
        upload3() {
            const formData = new FormData;
            formData.set('file', this.file);

            axios.post('http://127.0.0.1:8000/api/upload_baw', formData);
        },
        upload4() {
            const formData = new FormData;
            formData.set('file', this.file);

            axios.post('http://127.0.0.1:8000/api/upload_valid', formData);
        }
    }
}
</script>

<style scoped>

form {
    margin-bottom: 60px;
}

.po {
    font-weight: bold;
}
</style>