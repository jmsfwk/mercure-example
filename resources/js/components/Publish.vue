<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="message">Message</label>
            <input type="text" id="message" class="form-control" v-model="message">
        </div>
    </form>
</template>

<script>
export default {
  name: 'Publish',
  data: () => ({
    message: null,
  }),
  methods: {
    submit () {
      axios.post('http://localhost/publish', {
        message: this.message,
      }).then(() => {
        this.message = null
      })
    }
  }
}
</script>
