<template>
    <v-app-bar color="" dark>
      <RouterLink to="/">
        <v-toolbar-title>
          <v-btn text>Services</v-btn>
        </v-toolbar-title>
      </RouterLink>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn text>新規登録</v-btn>
        <v-btn text>user_name</v-btn>
        <!-- <RouterLink to="/login"> -->
          <v-btn text @click="logout">Logout</v-btn>
        <!-- </RouterLink> -->
      </v-toolbar-items>
    </v-app-bar>
</template>

<script>
export default {
  methods: {
    async logout () {
      await this.$store.dispatch('auth/logout')

      this.$router.push('/login')
    }
  }
}
</script>
