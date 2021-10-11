<template>
 <div class="container">

<b class="title"> Lista de Wrestlers </b>

<ul class="flex-containers">
  <li class="flex-item" v-for="wrestler in wrestlers" :key="wrestler.id">

    <img :src="'../storage/' + wrestler.image" width="100%" height="120px" class="imgwrestler" > <br>
    <img :src="'../storage/dados.png'" width="15px" height="12px">
   <span class="nombre"> {{ wrestler.name }} </span> <br>
   <span class="power"> <b>Poder:</b> {{ wrestler.power }} </span> <br>
    <span class="power"> <b>Compañía:</b> {{ wrestler.company }} </span>
   <img src=""/>
  </li>

</ul>

 </div>
</template>


<script>
export default {
    data() {
        return {
            wrestlers: {}
        }
    },
    created() {
        this.getwrestlers();
    },
    methods: {
    getwrestlers() {
        this.axios.get('http://127.0.0.1:8000/api/ring')
        .then(response => {
        this.wrestlers = response.data;
           });
        }
    }
}
</script>

<style scoped>

.container {
    padding-top: 20px;
    padding-bottom: 60px;
    padding-left: 20px;
    padding-right: 20px;
    background-color: black;
    width: 100%;
    border-radius: 15px;
}

.title {
    color: white;
    font-size: 20px;
    padding: 20px;
}

.flex-containers {
  /* We first create a flex layout context */
  display: flex;
  
  /* Then we define the flow direction 
     and if we allow the items to wrap 
   * Remember this is the same as:
   * flex-direction: row;
   * flex-wrap: wrap;
   */
  flex-flow: row wrap;
  
  /* Then we define how is distributed the remaining space */
  justify-content: space-around;
  
  padding: 0;
  /* Arriba | Derecha | Abajo | Izquierda */
  margin: 50px 0 0 0;
  list-style: none;
}

.flex-item {
  background: tomato;
  padding:  0px;
  width: 150px;
  /*height: 150px;*/
  height: 200px;
  margin-top: 10px;
  /*line-height: 150px;*/
  color: white;
  font-weight: bold;
  /*font-size: 3em;*/
  text-align: center;
  border-radius: 20px;
}

.nombre {
    font-size: 1em;
    /*vertical-align: bottom;*/
    /*bottom: 0px;*/
    /*vertical-align: sub;*/
}

.imgwrestler {
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
}

</style>