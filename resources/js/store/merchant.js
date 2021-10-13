import axios from 'axios'

export default {
  state: {
    merchant: null
  },
  mutations: {
    set_merchant (state, data) {
      state.merchant = data
    },
    reset_merchant (state) {
      state.merchant = null
    }
  },
  getters: {
    merchant (state) {
      return state.merchant
    }
  },
  actions: {
    get_merchant ({ commit }, id) {
      return new Promise(() => {
        axios.get(`/api/merchant/owner/${id}`).then(response => {
          commit('set_merchant', response.data)
        })
        .catch(err => {
          console.log(err)
          commit('reset_merchant')
        })
      })
    }
  }
}