<template>
    <div>
        <div class="vld-parent">
            <loading :active.sync="loading"
                    :can-cancel="false"></loading>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-white">
                        <h4>Diagnosticos</h4>
                        <div class="form-group"> 
                            <div class="input-group-alternative">
                                <input v-model="search" placeholder="Busca por nombre" type="text" class="form-control form-control-alternative">
                            </div>
                        </div>
                        </div>
                        <div class="card-body p-0 bg-secondary">
                            <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th>Nombre</th>
                                <th>Fecha de la cita</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="diagnostico in filterData" v-bind:key="diagnostico.id">
                                <td>
                                    {{ diagnostico.user.name }}
                                </td>
                                <td>
                                    {{ diagnostico.event.start }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <!-- <a :href="`/diagnostico/${diagnostico.id}`" class="btn btn-dark">
                                            <i class="fas fa-eye"></i>
                                        </a> -->
                                        <a :href="`/diagnostico/${diagnostico.id}/edit`" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button @click="delete_d(diagnostico.id)" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <b-pagination v-if="search === ''" @change="next_page" size="md" :total-rows="total_page" v-model="current_page" :per-page="per_page"></b-pagination >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import swal from 'sweetalert2'
export default {
    data: function () {
        return {
            diagnosticos: [],
            loading: false,
            current_page: null,
            total_page: null,
            per_page: null,
            search: ''
        }
    },
    mounted () {
        this.get_diagnosticos();
    },
    components: {
        Loading
    },
    computed: {
        filterData() {
            return this.diagnosticos.filter(diagnostico => {
                return diagnostico.user.name.toLowerCase().includes(this.search.toLowerCase()) 
            })
        },
    },
    methods: {
        delete_d(id) {
            const vm = this;
            swal({
                title: 'Estas seguro?',
                text: "Lo eliminaras permanentemente",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    axios.delete(`/diagnostico/${id}`)
                        .then( (response) => {
                            vm.get_diagnosticos();
                            swal(
                            '¡Eliminado!',
                            response.data,
                            'success'
                            );
                        })
                        .catch(err => {
                            console.log(err);
                        })
                }
            })
        },
        get_diagnosticos () {
            const vm = this;
            this.loading = true
            axios.get('/api/diagnosticos')
                .then(response => {
                    this.diagnosticos = response.data.data;
                    vm.current_page = parseInt(response.data['current_page']);
                    vm.total_page = parseInt(response.data['total']);
                    vm.per_page = parseInt(response.data['per_page']);
                    vm.loading = false;
                })
                .catch(err => {
                    console.log(err.data);
                });
        },
        next_page (event) {
            const vm = this;
            this.loading = true;
            axios.get(`/api/diagnosticos?page=${event}`)
                .then(function (response) {
                    vm.diagnosticos = response.data.data;
                    vm.loading = false;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        }
    }
}
</script>
