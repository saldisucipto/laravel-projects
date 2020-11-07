// membuat instance pada Vue Js versi 3

const app = Vue.createApp({
  // data deklrasi
  data() {
    return {
      courseGoalA: "<i> Menyelesaikan Course Ini </i>",
      courseGoalB: "Lanjut Untuk Course Ini",
      vueLink: "https://v3.vuejs.org/guide/",
    };
  },

  methods: {
    // function
    outputGoal() {
      const randomNumber = Math.random();
      if (randomNumber < 0.5) {
        return this.courseGoalA;
      } else {
        return this.courseGoalB;
      }
    },
  },
});
// mount app Intance
app.mount("#user-goal");
