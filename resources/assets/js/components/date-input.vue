<template>
  <div>
    <datetime
      name= "start"
      type="datetime"
      v-model="date"
      input-class="form-control"
      format="yyyy-MM-dd HH:mm:ss"
      :phrases="{ok: 'Continuar', cancel: 'Salir'}"
      :hour-step="2"
      :minute-step="15"
      :week-start="2"
      use12-hour
      auto>
      </datetime>
  </div>
</template>

<script>
  import { Datetime } from 'vue-datetime';
  import 'vue-datetime/dist/vue-datetime.css'
  export default {
    data: function () {
      return {
        date: ''
      }
    }
  }
</script>
