<template>
  <button @click="showStepTwo2()" class="btn-form-submint" type="button">Continue to Payment</button>
</template>
<script>



export default {

  methods: {
    showStepTwo2() {
      this.$emit("showsteptwo2");

    },
  },
};


</script>
<style>
.btn-form-submint {
  width: 40%;
  height: 100%;
  background-color: #f2aa4cff;
  border: none;
  border-radius: 5px;
  font-family: sans-serif;
  font-weight: 600;
  color: white;
  /* font-size: x-large; */
}
@media only screen and (max-width: 500px) {
  .btn-form-submint{
    width: 70%;

  }
}
</style>