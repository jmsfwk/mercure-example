<template>
    <div>
        <h1>Mercure</h1>

        <div class="row">
            <div class="col-6">
                <h2>Publish</h2>
                <Publish/>
            </div>
            <div class="col-6">
                <h2>Subscribe</h2>
                <Subscribe :topics="topics"/>
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
    topics: ['https://example.com/books/1.jsonld']
  }),
  components: {
    Publish,
    Subscribe,
  }
}
</script>
