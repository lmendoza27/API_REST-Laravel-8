<template>
    <div class="container">
        <h2 class="text-center">Lista de Personajes con +1000 de Poder</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'ProductIndex' }" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
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
              this.axios.get('http://127.0.0.1:8000/api/power')
                  .then(response => {
                      this.products = response.data;
                  });
            }
        }
    }
</script>