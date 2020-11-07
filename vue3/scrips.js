// membuat instance pada Vue Js versi 3

const app = Vue.createApp({
  // data deklrasi
  data() {
    return {
      counter: 0,
    };
  },

  methods: {
    kalkulasi() {
      counter = this.counter;
      if (counter <= 0) {
        return (this.counter = 0);
      } else {
        return this.counter--;
      }
    },
  },
});
// mount app Intance
app.mount("#events");
