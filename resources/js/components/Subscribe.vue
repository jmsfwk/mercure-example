<template>
    <ul class="list-group">
        <li v-for="message in messages" class="list-group-item py-1">{{ message.data }}</li>
    </ul>
</template>

<script>
export default {
  name: 'Subscribe',
  props: {
    topics: Array,
  },
  data: () => ({
    messages: [],
  }),
  methods: {
    push (message) {
      this.messages.push(message)
    }
  },
  created () {
    const url = new URL('http://localhost/.well-known/mercure')
    this.topics.forEach(t => {
      url.searchParams.append('topic', t)
    })
    this.eventSource = new EventSource(url)
    this.eventSource.addEventListener('message', this.push)
  },
  destroyed () {
    this.eventSource.close()
  }
}
</script>
