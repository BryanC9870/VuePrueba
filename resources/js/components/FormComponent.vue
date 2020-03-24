<template>
        <div class="card" style="margin: 25px">
                    <div class="card-header">¿En que estas pensando ahora?</div>
                        <div class="card-body">
                            <form action="" v-on:submit.prevent="NuevoPensamiento()">
                                <div class="form-group">
                                    <label for="my-input">Ahora estoy pensando en:</label>
                                    <input id="my-input" class="form-control" type="text" name="input-pensamiento"
                                    v-model="descripcion">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Enviar Pensamiento
                                </button>
                            </form>
                        </div>
                    </div>
</template>

<script>
    export default {
        data(){
            return{
                descripcion: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            NuevoPensamiento(){
                const params = {
                        descripcion: this.descripcion
                };
                this.descripcion = '';

                axios.post('/pensamientos', params)
                .then((response) => {
                    const pensamiento = response.data;
                     this.$emit('nuevo', pensamiento);
                });
            }
        }
    }
</script>