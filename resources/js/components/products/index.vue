<template>
    <div class="container">
        <h2 class="text-center">Lista de Personajes</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'ProductPower' }" class="btn btn-warning btn-sm float-left mb-2">Power + 1000</router-link>
            </div>
        <div class="col-md-12">
                <router-link :to="{ name: 'WrestlingIndex' }" class="btn btn-dark btn-sm float-left mb-2">Wrestling</router-link>
            </div>
              </div>
<div class="row">
          <div class="col-md-6">
                <router-link :to="{ name: 'ProductCreate' }" class="btn btn-primary btn-sm float-left mb-2">Agregar Personaje</router-link>
            </div>
</div>      
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Power</th>
                        <th>Min Power</th>
                        <th>Max Power</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, key) of products">
                            <td>{{ key+1 }}</td>
                            <td>{{ product.name }}</td>
                            <td>{{ product.power }}</td>
                            <td>{{ product.atamin }}</td>
                            <td>{{ product.atamax }}</td>
                            <td>
                                <router-link class="btn btn-success btn-sm" :to="{ name: 'ProductEdit', params: { productId: product.id }}">Editar</router-link>
                                <button class="btn btn-danger btn-sm" @click="deleteProduct(product.id)">Borrar</button>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: {}
            }
        },
        created() {
            this.getProducts();
        },
        methods: {
            getProducts() {
              //this.axios.get('http://127.0.0.1:8000/api/mirar')
              this.axios.get('http://127.0.0.1:8000/api/ranking')
                  .then(response => {
                      this.products = response.data;
                  });
            },
            deleteProduct(productId) {
                this.axios
                    .delete(`http://127.0.0.1:8000/api/borrado/${productId}`)
                    .then(response => {
                        let i = this.products.map(data => data.id).indexOf(productId);
                        this.products.splice(i, 1)
                    });
            }
        }
    }
</script>