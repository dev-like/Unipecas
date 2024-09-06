<style media="all">
  .pageloader{
      background-color:#fff;
      overflow:hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 100000000;
  }
  .pageloader img{
    width: 250px;
  }
  .pageloader h3{
    color: #009051;
  }
</style>



<div class="pageloader">
  <img src="{{ asset('theme/images/loader.gif')}}">
</div>
