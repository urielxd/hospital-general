<template>
  <div class="vld-parent">
    <loading :active.sync="loading"
            :can-cancel="false"></loading>
    <div class="row">
      <div class="col-12 mb-2 mt-1">
        <a href="/admin/administradores/create" class="btn btn-primary text-white mb-2">
          Nuevo administrador
        </a>
      </div>
      <div class="col-12">
       <div class="card shadow">
         <div class="card-header bg-white">
           <h4>Administradores</h4>
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
                <tr v-for="admin in administradores">
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
                    <div class="btn-group">
                      <a :href="'/admin/administradores/' + admin.id + '/edit'" class="btn btn-primary text-white">
                        <i class="fas fa-edit"></i>
                      </a>
                      <button @click="delete_admin(admin.id)" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
         </div>
         <div class="card-footer">
            <b-pagination @change="next_page" size="md" :total-rows="total_page" v-model="current_page" :per-page="per_page"></b-pagination >
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
        administradores: [],
        loading: false,
        current_page: null,
        total_page: null,
        per_page: null,
      }
    },
    mounted () {
      this.get_admin();
    },
    components: {
      Loading
    },
    methods:  {
      get_admin () {
        const vm = this;
        this.loading = true
        axios.get('/api/apiadmin')
          .then(response => {
            this.administradores = response.data.data;
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
        axios.get(`/api/apiadmin?page=${event}`)
          .then(function (response) {
            vm.administradores = response.data.data;
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
              axios.delete(`/api/apiadmin/${id}`)
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
