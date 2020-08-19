<template>
  <div>
    <ul>
      <li :class="{'tab_item-active': tab === 1 }" @click="tab = 1">Login</li>
      <li :class="{'tab_item-active': tab === 2 }" @click="tab = 2">Register</li>
    </ul>
    <v-card width="400px" class="mx-auto mt-5" v-show="tab === 1">
      <v-card-title>
        <h1 class="display-1">Login</h1>
      </v-card-title>
      <v-card-text>
        <v-form @submit.prevent="login">
          <v-text-field prepend-icon="mdi-email" label="email" v-model="loginForm.email" />
          <v-text-field prepend-icon="mdi-lock" append-icon="mdi-eye-off" type="password" label="passowrd" v-model="loginForm.password"/>
          <v-card-actions>
            <v-btn class="info" type="submit">Login</v-btn>
          </v-card-actions>
        </v-form>
      </v-card-text>
    </v-card>
    <v-card width="400px" class="mx-auto mt-5" v-show="tab === 2">
      <v-card-title>
        <h1 class="display-1">Register</h1>
      </v-card-title>
      <v-card-text>
        <v-form @submit.prevent="register">
          <v-text-field prepend-icon="mdi-account-circle" label="name" v-model="registerForm.name" />
          <v-text-field prepend-icon="mdi-email" label="email" v-model="registerForm.email"/>
          <v-text-field prepend-icon="mdi-lock" append-icon="mdi-eye-off" type="password" label="passowrd" v-model="registerForm.password"/>
          <v-text-field prepend-icon="mdi-lock" append-icon="mdi-eye-off" type="password" label="passowrd_confirm" v-model="registerForm.password_confirmation"/>
          <v-card-actions>
            <v-btn class="info" type="submit">Register</v-btn>
          </v-card-actions>
        </v-form>
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
export default {
  data () {
    return{
      tab: 1,
      loginForm: {
        email: '',
        password: '',
      },
      registerForm: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    login () {
      console.log(this.loginForm)
    },
    async register () {
      await this.$store.dispatch('auth/register', this.registerForm)

      this.$router.push('/')
    },
    async login () {
      await this.$store.dispatch('auth/login', this.loginForm)

      this.$router.push('/')
    },
  }
}
</script>

