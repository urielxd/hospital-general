<template>
    <div class="vld-parent">
        <loading :active.sync="loading"
            :can-cancel="false"></loading>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12 mb-4">
                    <a href="/admin/agendar/citas/pacientes" class="btn btn-primary text-white">
                        Nueva cita
                    </a>
                </div>
                <div class="col-12">
                    <div class="card bg-secondary">
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="display-4">Filtrar información</h4>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input v-model="search" type="text"
                                            placeholder="Busca: Paciente | Doctor | Especialidad"
                                            class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Doctor</th>
                                    <th>Paciente</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Especialidad</th>
                                    <th>
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cita in filterCita" v-if="citas.length > 0" v-bind:key="cita.id">
                                    <td>
                                       <img v-bind:src="cita.medico.avatar" alt="" class="rounded-circle" style="width: 30px">
                                    </td>
                                    <td>{{ cita.medico.name }}</td>
                                    <td>{{ cita.cliente.name }}</td>
                                    <td>{{ cita.start | moment("dddd D, MMMM  YYYY") }}</td>
                                    <td>{{ cita.start | moment("h:mm") }}</td>
                                    <td v-if="cita.medico.profile">{{ cita.medico.profile.especialidad.name }}</td>
                                    <td v-if="!cita.medico.profile">
                                        <span class="badge badge-danger">
                                            Sin especialidad
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a :href="`citas/${cita.id}/edit`" class="btn btn-secondary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button @click="deleteCita(cita)" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="card-footer">
                            <b-pagination @change="next_page" size="md" :total-rows="total_page" v-model="current_page" :per-page="per_page"></b-pagination >
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
        props: ['doctores', 'especialidades'],
        data: function () {
            return {
                citas: [],
                current_page: null,
                total_page: null,
                per_page: null,
                loading: false,
                search: '',
            }
        },
        components: {
            Loading
        },
        computed: {
            filterCita() {
              return this.citas.filter(cita => {
                return cita.medico.name.toLowerCase().includes(this.search.toLowerCase()) ||
                        cita.cliente.name.toLowerCase().includes(this.search.toLowerCase()) ||
                        cita.medico.profile.especialidad.name.toLowerCase().includes(this.search.toLowerCase())
              })
            },
        },
        mounted() {
            this.get_events();
        },
        methods: {
            get_events () {
                const vm = this;
                this.loading = true
                axios.get('/api/eventos?page=1')
                  .then(function (response) {
                    vm.citas = response.data.data;
                    vm.current_page = parseInt(response.data['current_page']);
                    vm.total_page = parseInt(response.data['total']);
                    vm.per_page = parseInt(response.data['per_page']);
                    vm.loading = false;
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
            },
            deleteCita (cita) {
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
                      axios.delete(`/api/eventos/${cita.id}`)
                        .then( (response) => {
                            vm.get_events();
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
            next_page (event) {
                const vm = this;
                this.loading = true;
                axios.get(`/api/eventos?page=${event}`)
                  .then(function (response) {
                    vm.citas = response.data.data;
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
