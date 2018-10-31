<template>
  <div class="vld-parent">
    <loading :active.sync="loading"
            :can-cancel="false"></loading>
    <div class="row">
      <div class="col-12 mb-2 mt-1">
        <a href="/admin/pacientes/create" class="btn btn-primary text-white mb-2">
          Nuevo Paciente
        </a>
      </div>
      <div class="col-12">
       <div class="card shadow">
         <div class="card-header bg-white">
           <h4>Pacientes</h4>
           <div class="form-group">
             <div class="input-group-alternative">
               <input v-model="search" placeholder="Busca el paciente por nombre" type="text" class="form-control fomr-control-alternative">
             </div>
           </div>
         </div>
         <div class="card-body p-0 bg-secondary">
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th></th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="paciente in filterData" v-if="paciente.profile" v-bind:key="paciente.id">
                  <td>
                    <img :src="paciente.avatar" class="rounded-circle" style="width: 30px" alt="">
                  </td>
                  <td>
                    {{ paciente.name }}
                  </td>
                  <td>
                    {{ paciente.email }}
                  </td>
                  <td>
                    <div class="btn-group">
                      <a :href="'/admin/paciente/agendar/cita/' + paciente.id" class="btn btn-primary">
                        Agendar cita
                      </a>
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
</template>

<script>
  import axios from 'axios'
  import Loading from 'vue-loading-overlay';
  import 'vue-loading-overlay/dist/vue-loading.css';
  import swal from 'sweetalert2'

  export default {
    data: function () {
      return {
        pacientes: [],
        loading: false,
        current_page: null,
        total_page: null,
        per_page: null,
        search: ''
      }
    },
    mounted () {
      this.get_admin();
    },
    components: {
      Loading
    },
    computed: {
      filterData() {
        return this.pacientes.filter(paciente => {
          return paciente.name.toLowerCase().includes(this.search.toLowerCase()) 
        })
      },
    },
    methods:  {
      get_admin () {
        const vm = this;
        this.loading = true
        axios.get('/api/paciente')
          .then(response => {
            this.pacientes = response.data.data;
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
        axios.get(`/api/paciente?page=${event}`)
          .then(function (response) {
            vm.pacientes = response.data.data;
            vm.loading = false;
          })
          .catch(function (error) {
            // handle error
            console.log(error);
          })
      },
      delete_paciente (id) {
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
              axios.delete(`/api/paciente/${id}`)
                .then( (response) => {
                    vm.get_admin();
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
      }
    }
  }

</script>
