<template>
    <div class="mb-3">
        <h3 >{{ type | ucfirst }}</h3>
        <ul class="list-group">
            <li v-for="message in messages" class="list-group-item py-1">{{ message.data }}</li>
        </ul>
    </div>
</template>

<script>
export default {
  name: 'Subscribe',
  props: {
    topics: Array,
    type: {
      type: String,
      default: 'message'
    }
  },
  data: () => ({
    messages: [],
  }),
  methods: {
    push (message) {
      this.messages.push(message)
    }
  },
  filters: {
    ucfirst (value) {
      if (!value) {
        return ''
      }
      value = value.toString()
      return value.charAt(0).toUpperCase() + value.slice(1)
    }
  },
  created () {
    const url = new URL('http://localhost/.well-known/mercure')
    this.topics.forEach(t => {
      url.searchParams.append('topic', t)
    })
    this.eventSource = new EventSource(url)
    this.eventSource.addEventListener(this.type, this.push)
    window.addEventListener('beforeunload', () => {
      this.eventSource.close()
    })
  },
  destroyed () {
    this.eventSource.close()
  }
}
</script>
