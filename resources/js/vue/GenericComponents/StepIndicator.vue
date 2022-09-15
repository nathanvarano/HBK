<template>
<div class="row">
  <div class="col-xs-12 col-md-8 offset-md-2 block border">
    <div class="wrapper-progressBar">
      <ul class="progressBar">
        <li :class="{ active: currentStep >= 1 }">Reviewer details</li>
        <li :class="{ active: currentStep >= 2 }">Movie</li>
        <li :class="{ active: currentStep >= 3 }">Review</li>
        <li :class="{ active: currentStep >= 4 }">Additional details</li>
        <li :class="{ active: currentStep == 5 }">Confimation</li>
      </ul>
    </div>
  </div>
</div>
</template>
<script>

export default {
    props: {
        currentStep: {
            type: Number,
            required: true
        },
    }
}
</script>
<style>

.row {
    padding-bottom: 40px;
}
.wrapper-progressBar {
    width: 100%
}

.progressBar li {
    list-style-type: none;
    float: left;
    width: 10%;
    position: relative;
    text-align: center;
}

.progressBar li:before {
    content: " ";
    line-height: 30px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    border: 1px solid orangered;
    display: block;
    text-align: center;
    margin: 0 auto 10px;
    background-color: white
}

.progressBar li:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px;
    background-color: #ddd;
    top: 15px;
    left: -50%;
    z-index: -1;
}

.progressBar li:first-child:after {
    content: none;
}

.progressBar li.active {
    color: orangered;
}

.progressBar li.active:before {
    border-color: orangered;
    background-color: orangered
}

.progressBar li.active:after {
    background-color: orangered;
}
</style>