<template>
    <div class="ship-double-main">
      <div class="ship-main-part">
  <div class="ship-detail-head">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="31"
      height="31"
      fill="#232323"
      class="bi bi-truck icon-setting"
      viewBox="0 0 16 16"
    >
      <path
        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
      />
    </svg>
    <p class="ship-detail-head-text">Ship To</p>
  </div>
  <div class="ship-detail-add-div">
    <div class="ship-name-head">
      <p class="ship-name-text">Huzaifa Ahmed</p>
      <button class="ship-change-button">Change</button>
    </div>
    <p class="ship-address">Street Address</p>
    <p class="ship-address">Address</p>
    <p>Karachi,State,postcode,country</p>
  </div>
</div>
<div class="ship-main-part">

  <div class="ship-detail-head">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="31"
      height="31"
      fill="#232323"
      class="bi bi-credit-card-2-back-fill icon-setting"
      viewBox="0 0 16 16"
    >
      <path
        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"
      />
    </svg>
    <p class="ship-detail-head-text">Payment</p>
  </div>
  <div class="ship-detail-add-div">
    <div class="ship-name-head">
      <p class="ship-name-text">*****4242 Exp:06/27</p>
      <button class="ship-change-button">Change</button>
    </div>
    <p class="ship-address">Billing Address:huzaifaAhmed,Fulladress</p>
  </div>
  </div>
</div>
</template>

<style>
.ship-double-main{
  background-color: #e7e7e7;
  display: flex;
  justify-content: space-around;
  align-items: center;
  flex-wrap: wrap;
}
.ship-main-part{
  width: 356px;
}
.ship-main-div {
  width: 80%;
  height: auto;
  /* background-color: aqua; */
}
.ship-detail-div {
  width: 100%;
  height: 100%;
  /* background-color: aquamarine; */
}
.ship-detail-head-text {
  text-align: center;
  width: auto;
  margin-left: 10px;
    color: #f2aa4cff;
    margin-bottom: 0px;
    /* background-color: bisque; */
    font-size: 35px;
    font-family: "Segoe UI";
}
.ship-detail-head {
  display: flex;
  align-items: center;
  background-color: #e7e7e7;
}
.ship-detail-add-div {
  background-color: white;

  border: 1px solid rgb(172, 172, 172);
  padding: 30px;
  width: 100%;
  height: 150px;
  /* height: 100px; */
  /* background-color: rgb(243, 233, 233); */
}
.ship-name-head {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}
.ship-name-text {
  margin: 0;
}
.ship-change-button {
  background-color: white;
  border: none;
  color: #f2aa4cff;
}
.ship-address {
  margin: 0;
}
@media only screen and (max-width: 767px) {
  .ship-main-part {
    width: 100%;
    margin: 10px;

  }
  .icon-setting{
    margin-left: 6px;
  }
}
</style>