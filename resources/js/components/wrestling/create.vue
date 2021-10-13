<template>
    <div class="container">
        <h2 class="text-center">Crear Personaje</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'WrestlingIndex' }" class="btn btn-primary btn-sm float-right mb-2">Volver</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
    <form @submit.prevent="submitForm">
        <div class="form-group">
            <label for="title">Nombre</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Post Title" v-model="formData.name">
          </div>

          <div class="form-group">
            <label for="description">Compañía</label>
            <textarea name="description" class="form-control" v-model="formData.company"></textarea>
          </div>

        <div class="form-group">
            <label for="description">POWER</label>
            <textarea name="description" class="form-control" v-model="formData.power"></textarea>
          </div>

          <div class="form-group">
            <label for="descrasiption">Imagen</label>
            <input type="file" name="image" class="form-control-file" id="image" @change="onFileChange">
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-success" />
          </div>
    </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
        return{
            formFields: {
                name: null,
                power: null,
                company: null,
                image: null
            },
        }
        },
        methods: {
            /*createProduct() {
                this.axios.post('http://127.0.0.1:8000/api/luchar', this.product)
                    .then(response => (
                        this.$router.push({ name: 'WrestlingIndex' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }*/
            submitForm(){
    let formData = new FormData();

    formData.append("picture", this.formFields.picture);
    formData.append("title", this.formFields.title);
    formData.append("description", this.formFields.description);

    axios.post('/posts', formData1)
            .then((res) => {
                console.log(res);
            })
            .catch((error) => {
                console.log(error);
    });
}
        }
    }
</script>