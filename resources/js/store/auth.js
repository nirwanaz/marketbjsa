import axios from 'axios'
import { removeHeaderToken, setHeaderToken } from '../helpers/auth-header'

export default{
  state: {
    user: null,
    isLoggedIn: false
  },
  mutations: {
    set_user (state, data) {
      state.user = data
      state.isLoggedIn = true
    },
    reset_user(state) {
      state.user = null,
      state.isLoggedIn = false
    }
  },
  getters: {
    isLoggedIn (state) {
      return state.isLoggedIn
    },
    user (state) {
      return state.user
    }
  },
  actions: {
    login ({ commit }, data) {
      return new Promise((resolve, reject) => {
        axios.post('/api/account/login', data)
        .then(response => {
          const token = response.data.token
          localStorage.setItem('token', token)
          resolve(response)
        })
        .catch(err => {
          commit('reset_user')
          localStorage.removeItem('token')
          reject(err)
        })
      })
    },
    get_user ({ commit }) {
      const token = localStorage.getItem('token')

      if (!token) {
        return
      }

      setHeaderToken(token)

      return new Promise((resolve, reject) => {
        axios.get('/api/user')
        .then(response => {
          commit('set_user', response.data)
          resolve(response)
        })
        .catch(err => {
          commit('reset_user')
          removeHeaderToken()
          localStorage.removeItem('token')
          location.reload()
          reject(err)
        })
      })
    },
    logout ({ commit }) {
      return new Promise((resolve, reject) => {
        axios.post('/api/account/logout')
        .then(response => {
          commit('reset_user')
          localStorage.removeItem('token')
          removeHeaderToken()
          resolve(response)
        })
        .catch(err => {
          reject(err)
        })
        
      })
    },
    register ({ commit }, data) {
      return new Promise((resolve, reject) => {
        axios.post('/api/account', data)
        .then(response => {
          resolve(response)
        })
        .catch(err => {
          commit('reset_user')
          reject(err)
        })
      })
    }
  }
  
}