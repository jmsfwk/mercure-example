<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" id="type" class="form-control" v-model="type">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <input type="text" id="message" class="form-control" v-model="message">
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</template>

<script>
export default {
  name: 'Publish',
  data: () => ({
    type: null,
    message: null,
  }),
  methods: {
    submit () {
      axios.post('http://localhost/publish', {
        type: this.type,
        message: this.message,
      }).then(() => {
        this.type = null
        this.message = null
      })
    }
  }
}
</script>
