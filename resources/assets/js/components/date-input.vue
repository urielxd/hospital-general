<template>
  <div>
    <datetime
      :name= "name"
      type="datetime"
      v-model="date"
      input-class="form-control"
      format="yyyy-MM-dd HH:mm:ss"
      :phrases="{ok: 'Continuar', cancel: 'Salir'}"
      :hour-step="1"
      :minute-step="40"
      :week-start="7"
      min-datetime="07:00:00"
      auto>
      </datetime>
  </div>
</template>

<script>
  import { Datetime } from 'vue-datetime';
  import 'vue-datetime/dist/vue-datetime.css'
  export default {
    props: ['name'],
    data: function () {
      return {
        date: '',
        minDate: moment().format()
      }
    }
  }
</script>
