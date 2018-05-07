<template>
    <div>
        <div>{{ $store.state.counter }}</div>
        <button @click="increaseCounter()">counter++</button>
        <div>{{ $store.state.testData }}</div>
        <div>graphql data: {{ $store.state.graphQlTestData }}</div>
        <nuxt-link to="/">home</nuxt-link>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            name: 'paul'
        }
    },
    methods: {
        increaseCounter() {
            this.$store.commit('increment')
        }
    },
    // mounted() cannot be used with ssr, we must use created() to call our inits
    created() {
    },
    // if we want external data to be rendered on the server instead of the client, it must be called using the fetch method
    async fetch ({ store, params }) {
        // this will get called on every load of the component
        await store.dispatch('getTestData')
        
        // you can check if the data already exists before calling the external api, otherwise it will be loaded
        // fresh everytime you go back to that page, which delays the loading of the entire component
        if (!store.state.additionalTestData)
            await store.dispatch('getAdditionalTestData')

        if (!store.state.graphQlTestData)
            await store.dispatch('getGraphQlTestData')
    }
}
</script>
