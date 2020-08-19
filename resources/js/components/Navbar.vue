<template>
    <v-app-bar color="" dark>
      <RouterLink to="/">
        <v-toolbar-title>
          <v-btn text>Services</v-btn>
        </v-toolbar-title>
      </RouterLink>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn v-if="isLogin" text>新規登録</v-btn>
        <v-btn text v-if="isLogin">{{ username }}</v-btn>
        <!-- <RouterLink to="/login"> -->
        <v-btn v-if="isLogin" text @click="logout">Logout</v-btn>
        <!-- </RouterLink> -->
      </v-toolbar-items>
    </v-app-bar>
</template>

<script>
export default {
  computed: {
    isLogin () {
      return this.$store.getters['auth/check']
    },
    username () {
      return this.$store.getters['auth/username']
    }
  },
  methods: {
    async logout () {
      await this.$store.dispatch('auth/logout')

      this.$router.push('/login')
    }
  }
}
</script>
