import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import {GRAPHQL_ENDPOINT} from '../config'

Vue.use(Vuex)

const store = () => {
  return new Vuex.Store({
    state: {
      counter: 0,
      testData: false,
      additionalTestData: false,
      graphQlTestData: false
    },
    actions: {
        // use async/await for promise-based actions
        async getTestData ({ commit }) {
            // await allows the code inside an async function to behave like synchronous code;
            // it will await the result of the promise before moving on
            let { data } = await axios.get('https://moi-global.com/wp-json/wp/v2/posts')
            commit('setTestData', data[0].title.rendered)
        },
        async getAdditionalTestData({ commit }) {
            let { data } = await axios.get('https://moi-global.com/wp-json/wp/v2/posts')
            commit('setAdditionalTestData', data[1].title.rendered)
        },
        // perform a graphql request to the backend
        async getGraphQlTestData({ commit }) {
            let { data } = await axios.post(GRAPHQL_ENDPOINT, {
                query: `{
                    posts {
                        nodes {
                            id
                            title
                        }
                    }
                    examples {
                        nodes {
                            title
                        }
                    }
                }`
            })
            commit('setGraphQlTestData', data.data.posts.nodes[0].title)
        }
    },
    mutations: {
      increment (state) {
        state.counter++
      },
      setTestData (state, testData) {
          state.testData = testData
      },
      setAdditionalTestData (state, additionalTestData) {
          state.additionalTestData = additionalTestData
      },
      setGraphQlTestData (state, graphQlTestData) {
          state.graphQlTestData = graphQlTestData
      }
    }
  })
}

export default store
