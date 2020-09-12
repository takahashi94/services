<template>
  <v-card width="400px" class="mx-auto mt-5">
      <v-card-title>
        <h1 class="display-1">サービス登録</h1>
      </v-card-title>
      <v-card-text>
        <v-form @submit.prevent="submit">
          <v-text-field
            v-model="serviceForm.name"
            prepend-icon="apps"
            label="サービス名"
          />
          <v-text-field
            v-model="serviceForm.price"
            prepend-icon="local_offer"
            label="価格"
          />
          <v-select
            v-model="serviceForm.plan"
            :items="plan"
            prepend-icon="payment"
            label="プラン"
          />
          <v-text-field
            v-model="serviceForm.billing_date"
            prepend-icon="insert_invitation"
            type='date'
            label="請求日"
          />
          <v-card-actions>
            <v-btn class="info" type="submit">登録</v-btn>
          </v-card-actions>
        </v-form>
      </v-card-text>
    </v-card>
</template>

<script>
import { mapState } from 'vuex'
import { CREATED, UNPROCESSABLE_ENTITY } from '../util'

export default {
  data () {
    return {
      plan: ['月額', '年額'],
      // serviceForm: {
      //   name: '',
      //   plan: '',
      //   price: '',
      //   billing_date: '',
      // },
      serviceForm: {},
      errors: null,
    }
  },
  methods: {
    reset () {
      this.serviceForm = {},
      this.$el.querySelector('input[type="text"]').value = null
    },
    async submit () {
      const response = await axios.post('/api/services', this.serviceForm)

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors
        return false
      }

      if (response.status !== CREATED) {
        this.$store.commit('error/setCode', response.status)
        return false
      }

      this.reset()

      this.$store.commit('message/setContent', {
        content: 'サービスが登録されました',
        timeout: 6000
      })

      this.$router.push('/').catch(err => {});
    }
  }
}
</script>
