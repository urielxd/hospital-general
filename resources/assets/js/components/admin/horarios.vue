<template>
  <div>
    <datetime
    type="datetime"
    v-model="date"
    input-class="form-control"
    value-zone="America/New_York"
    zone="Asia/Shanghai"
    :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit' }"
    :phrases="{ok: 'Continue', cancel: 'Exit'}"
    :hour-step="2"
    :minute-step="15"
    :week-start="7"
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
    },
    components: {
      datetime: Datetime
    }
  }
</script>
