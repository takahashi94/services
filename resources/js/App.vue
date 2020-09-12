<template>
  <v-app>
  <div>
    <header>
      <Navbar />
    </header>
    <main>
      <div class="container">
        <Message />
        <RouterView />
      </div>
    </main>
  </div>
  </v-app>
</template>


<script>
import Navbar from './components/Navbar.vue'
import Message from './components/Message.vue'
import { INTERNAL_SERVER_ERROR } from './util'

export default {
  components: {
    Message,
    Navbar,
  },
  computed: {
    errorCode () {
      return this.$store.state.error.code
    }
  },
  watch: {
    errorCode: {
      handler (val) {
        if (val === INTERNAL_SERVER_ERROR) {
          this.$router.push('/500')
        }
      },
      immediate: true
    },
    $route () {
      this.$store.commit('error/setCode', null)
    }
  }
}
</script>
