<template>
    <div class="container">
        <h2 class="text-center">Crear Personaje</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'ProductIndex' }" class="btn btn-primary btn-sm float-right mb-2">Volver</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label>Ataque Mínimo</label>
                        <input type="number" class="form-control" v-model="product.atamin">
                    </div>
                    <div class="form-group">
                        <label>Ataque Máximo</label>
                        <input type="number" class="form-control" v-model="product.atamax">
                    </div>
                    <button type="button" class="btn btn-primary" @click="createProduct()">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        methods: {
            createProduct() {
                this.axios.post('http://127.0.0.1:8000/api/agregar', this.product)
                    .then(response => (
                        this.$router.push({ name: 'ProductIndex' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>