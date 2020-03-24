<template>
    <div class="card" style="margin: 25px">
                <div class="card-header">Publicado en: {{ pensamiento.created_at }} - Última Actualización: {{ pensamiento.updated_at }}</div>

                <div class="card-body">
                    <input v-if="ModoEditar" type="text" class="form-control" v-model="pensamiento.description">
                    <p v-else>{{ pensamiento.description }}</p>
                </div>

                <div class="card-footer">
                     <button v-if="ModoEditar" class="btn btn-success"  v-on:click="onclickActualizar()">
                        Guardar Cambios
                    </button>

                    <button v-else class="btn btn-primary"  v-on:click="onclickEditar()">
                        Editar
                    </button>

                    <button class="btn btn-danger" v-on:click="onclickEliminar()">
                        Eliminar
                    </button>
                </div>
            </div>
</template>

<script>
    export default {
        props: ['pensamiento'],
        data(){
            return{
             ModoEditar: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onclickEliminar() {
                axios.delete(`/pensamientos/${this.pensamiento.id}`).then(() => {
                    this.$emit('Eliminar');
                });  
            },
            onclickEditar(){
                this.ModoEditar = true;
            },
            onclickActualizar(){
                const params = {
                        descripcion: this.pensamiento.description
                };
                axios.put(`/pensamientos/${this.pensamiento.id}`, params).then((response) => {
                 this.ModoEditar = false;
                 const pensamiento = response.data;
                 this.$emit('Actualizar', pensamiento);
                });
               
            }
        }
    }
</script>
