<template>
    <div>
        <h1>Mercure</h1>

        <p>This example uses Laravel only for the ease of prototyping. As the connection to the Mercure Hub uses a
            Symfony component it would be fairly easy to add to any project.</p>

        <p>It's important to note that messages are not exchanged between the separate Vue components. The Publish
            component sends a request to Laravel, which sends the message to the Mercure Hub. The Hub then sends
            the message to the browser via Server Sent Events.</p>

        <div class="row">
            <div class="col-6">
                <h2>Publish</h2>
                <Publish/>
            </div>
            <div class="col-6">
                <h2>Subscribe</h2>
                <Subscribe :topics="topics"/>
                <Subscribe type="socks" :topics="topics"/>
            </div>
        </div>
    </div>
</template>

<script>
import Publish from './components/Publish'
import Subscribe from './components/Subscribe'

export default {
  name: 'App',
  data: () => ({
    topics: ['http://localhost']
  }),
  components: {
    Publish,
    Subscribe,
  }
}
</script>
