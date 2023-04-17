
<template>
  <div class="main-div-checkout">
    <img
      class="image-div"
      src="http://localhost/store-main/public/assets/logo/FABT-Logo.png"
      alt=""
    />
    <div class="button-main-div content-wrap">
      <div class="btn-main-btn line-added">
        <button @click="showStepOne()" class="mainbtn" id="abc">1</button>
        <p class="btn-text">SHIPPING</p>
      </div>
      <div class="btn-main-btn line-added">
        <button id="abc2" @click="showStepTwo()" class="main-btn-1">2</button>
        <p class="btn-text">PAYMENT</p>
      </div>
      <div class="btn-main-btn1">
        <button @click="showStepThree()" class="main-btn-1" id="abc3">3</button>
        <p class="btn-text">REVIEW & SUBMIT</p>
      </div>
    </div>
    <div class="secure-text-main-div">
      <p class="secure-text">Secure Checkout</p>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="36"
        height="36"
        fill="white"
        class="bi bi-lock-fill"
        viewBox="0 0 16 16"
      >
        <path
          d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"
        />
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showFormOne: true,
      showFormTwo: false,
      showFormThree: false,
    };
  },
  methods: {
    showStepOne() {
      this.$emit("showstepone");
      var heloo3 = document.getElementById("abc3");
      heloo3.classList.add("main-btn-1");
      heloo3.classList.remove("mainbtn");

      var heloo2 = document.getElementById("abc2");
      heloo2.classList.add("main-btn-1");
      heloo2.classList.remove("mainbtn");

      var heloo = document.getElementById("abc");
      heloo.classList.add("mainbtn");
      heloo.classList.remove("main-btn-1");
      var btn2check = document.getElementById("thrid-part-ha");
      btn2check.style.display = "none";
      var all_shiping_detail = document.getElementById(
        "all-shiping-amout-detail"
      );
      all_shiping_detail.style.display = "none";
      var payment_show = document.getElementById("ShowFormOne_id");
      payment_show.style.display= "block";
      var payment_show2 = document.getElementById("ShowFormTwo_id");
      payment_show2.style.display= "none";
      window.scrollTo(0, 0);

    },
    showStepTwo() {
      this.$emit("showsteptwo");
      window.scrollTo(0, 0);

      var heloo3 = document.getElementById("abc3");
      heloo3.classList.add("main-btn-1");
      heloo3.classList.remove("mainbtn");

      var heloo2 = document.getElementById("abc2");
      heloo2.classList.add("mainbtn");
      heloo2.classList.remove("main-btn-1");

      var heloo = document.getElementById("abc");
      heloo.classList.add("main-btn-1");
      heloo.classList.remove("mainbtn");
      var btn2check = document.getElementById("thrid-part-ha");
      btn2check.style.display = "none";
      var all_shiping_detail = document.getElementById(
        "all-shiping-amout-detail"
      );
      all_shiping_detail.style.display = "flex";
    },
    showStepThree() {
      window.scrollTo(0, 0);

      this.$emit("showstepthree");
      var heloo3 = document.getElementById("abc3");
      heloo3.classList.add("mainbtn");
      heloo3.classList.remove("main-btn-1");

      var heloo2 = document.getElementById("abc2");
      heloo2.classList.add("main-btn-1");
      heloo2.classList.remove("mainbtn");

      var heloo = document.getElementById("abc");
      heloo.classList.add("main-btn-1");
      heloo.classList.remove("mainbtn");
      var all_shiping_detail = document.getElementById(
        "all-shiping-amout-detail"
      );
      all_shiping_detail.style.display = "flex";
      var arrangement=document.getElementById('thrid-part-ha')
      arrangement.style.order='-1'
    },
  },
};
</script>
<style>
.main-div-checkout {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 100%;
  height: 100px;
  background-color: #232323;
}
.image-div {
  width: 15%;
  height: 76%;
}
.button-main-div {
  width: 439px;
  height: 90%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  /* background-color: gray; */
}
.btn-main-btn {
  width: 8%;
  flex-direction: column;
  display: flex;
  justify-content: center;
  align-items: center;
}
.btn-main-btn1 {
  width: auto;
  flex-direction: column;
  display: flex;
  justify-content: center;
  align-items: center;
}
.main-btn-1 {
  width: 33px;
  height: 33px;
  font-size: 1vmax;
  border-radius: 100%;
  border: gray;
  color: black;
  background-color: white;
  font-weight: 100;
}
.mainbtn {
  width: 33px;
  height: 33px;
  font-size: 1vmax;
  border-radius: 100%;
  border: 1px solid white;
  color: white;
  background-color: #232323;
  font-weight: 100;
}
.mainbtn:hover {
  transition: 0.5s;
  border: none;
  color: white;
  background-color: gray;
}
.btn-text {
  margin-top: 6px;
  margin-bottom: 0;
  font-family: "Segoe UI";
  font-weight: 400;
  color: #f2aa4cff;
  font-size: 11px;
}

.line-added:after {
  content: "";
  display: flex;
  width: 108px;
  height: 2px;
  background: gray;
  left: 93px;
  bottom: 33px;
  position: relative;
}
.secure-text-main-div {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 22%;
  height: 100%;
  /* background-color: aqua; */
}
.secure-text {
  font-size: 2vmax;
  font-weight: 300;
  margin: 0;
  font-family: "Segoe UI";
  color: #f2aa4cff;
}
@media only screen and (max-width: 800px) {
  .secure-text-main-div {
    display: none;
  }
  .button-main-div {
    width: 300px;
  }
  .main-btn-1 {
    width: 23px;
    height: 23px;
    font-size: 10px;
  }
  .mainbtn {
    width: 23px;
    height: 23px;
    font-size: 10px;
  }
  .line-added:after {
    width: 84px;
    left: 61px;
    bottom: 22px;
  }
  .image-div {
    width: 151px;
  }
  .btn-text {
    font-size: 7px;
  }
}
@media only screen and (max-width: 500px) {
  .image-div {
    display: none;
  }
}
@media only screen and (max-width: 400px) {
  .line-added:after {
    width: 51px;
    left: 41px;
    bottom: 23px;
  }
  .button-main-div {
    width: 220px;
  }
}
</style>