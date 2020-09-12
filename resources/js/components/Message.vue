<template>
  <div v-show="message">
    <v-alert type="success">
      {{ message }}
    </v-alert>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState({
      message: state => state.message.content
    })
  }
}
</script>
