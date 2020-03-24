<template>
     <div class="row justify-content-center">
        <div class="col-md-8">

            <form-component @nuevo="AgregarPensamiento"></form-component>
            <pensamiento-component 
            v-for="(pensamiento, index) in ArrayPensamientos" 
            :key="pensamiento.id"
            :pensamiento="pensamiento"
            @Actualizar="ActualizarPensamiento(index, ...arguments)"
            @Eliminar="EliminarPensamiento(index)">
            </pensamiento-component>

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                    ArrayPensamientos: []
            };
        },

        mounted() {
            axios.get('/pensamientos').then((response) => {
                this.ArrayPensamientos = response.data;
            });
        },
        methods: {
            AgregarPensamiento(pensamiento){
                this.ArrayPensamientos.push(pensamiento);
            },
            ActualizarPensamiento(index, pensamiento) {
                this.ArrayPensamientos[index] = pensamiento;
            },
            EliminarPensamiento(index) {
                this.ArrayPensamientos.splice(index, 1);
            }
        }
    }
</script>