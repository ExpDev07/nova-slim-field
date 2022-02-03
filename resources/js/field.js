Nova.booting((Vue, router, store) => {
  Vue.component('index-slim-field', require('./components/IndexField'))
  Vue.component('detail-slim-field', require('./components/DetailField'))
  Vue.component('form-slim-field', require('./components/FormField'))
})
