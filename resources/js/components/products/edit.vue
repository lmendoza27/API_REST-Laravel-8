<template>
    <div class="container">
        <h2 class="text-center">Update Product</h2>
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'ProductIndex' }" class="btn btn-primary btn-sm float-right mb-2">Back</router-link>
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
                        <input type="text" class="form-control" v-model="product.atamin">
                    </div>
                    <div class="form-group">
                        <label>Ataque Máximo</label>
                        <input type="text" class="form-control" v-model="product.atamax">
                    </div>
                    <button type="button" class="btn btn-primary" @click="updateProduct()"> Update </button>
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
        mounted() {
            this.editProduct(this.$route.params.productId);
        },
        methods: {
            editProduct(productId) {
                this.axios.get(`http://127.0.0.1:8000/api/personaje/${productId}`)
                   .then((res) => {
                       this.product = res.data;
                   });
            },
            updateProduct() {
                this.axios
                    .patch(`http://127.0.0.1:8000/api/update/${this.$route.params.productId}`, this.product)
                    .then((res) => {
                        this.$router.push({ name: 'ProductIndex' });
                    });
            }
        }
    }
</script>