<template>
  <div class="vld-parent">
    <loading :active.sync="loading"
            :can-cancel="false"></loading>
    <div class="row">
      <div class="col-12 mb-2 mt-1">
        <a href="/admin/doctores/create" class="btn btn-primary text-white mb-2">
          Nuevo Doctor
        </a>
      </div>
      <div class="col-12">
       <div class="card shadow">
         <div class="card-header bg-white">
           <h4>Doctores</h4>
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
                  <th></th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Entrada</th>
                  <th>Salida</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="admin in filterData" v-bind:key="admin.id">
                  <td>
                    <img :src="admin.avatar" class="rounded-circle" style="width: 30px" alt="">
                  </td>
                  <td>
                    {{ admin.name }}
                  </td>
                  <td>
                    {{ admin.email }}
                  </td>
                  <td>
                    <span v-if="admin.schedule">
                      {{ admin.schedule.start }}
                    </span>
                    <span v-if="!admin.schedule" class="badge badge-danger">No asignado</span>
                  </td>
                  <td>
                    <span v-if="admin.schedule">
                      {{ admin.schedule.end }}
                    </span>
                    <span v-if="!admin.schedule" class="badge badge-danger">No asignado</span>
                  </td>
                  <td>
                    <div class="btn-group">
                      <a v-if="admin.schedule" :href="'horarios/' + admin.schedule.id + '/edit/'" class="btn btn-primary text-white">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a :href="'doctor/' + admin.id + '/horario'" v-if="!admin.schedule"  class="btn btn-dark">
                        Agregar horario
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
        doctores: [],
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
        return this.doctores.filter(doctor => {
          return doctor.name.toLowerCase().includes(this.search.toLowerCase()) 
        })
      },
    },
    methods:  {
      get_admin () {
        const vm = this;
        this.loading = true
        axios.get('/api/doctor')
          .then(response => {
            this.doctores = response.data.data;
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
        axios.get(`/api/doctor?page=${event}`)
          .then(function (response) {
            vm.doctores = response.data.data;
            vm.loading = false;
          })
          .catch(function (error) {
            // handle error
            console.log(error);
          })
      },
      delete_admin (id) {
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
              axios.delete(`/api/doctor/${id}`)
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
