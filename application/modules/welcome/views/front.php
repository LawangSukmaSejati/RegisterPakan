

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- begin panel group -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                <!-- panel 1 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab1" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingOne"data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title">She Sells Seashells</h4>
                        </div>
                    </span>
                    
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                        <!-- Tab content goes here -->
                        That fall, as Nadia and Masha got shipped off to prison camps in Siberia, South Brooklyn tried to recover from the storm. My dad and I spent a lot of time in the same apartment engrossed in separate laptops, separate internet missives. He followed Russian news bloggers closely and would update me on troubling developments. A rise in protofascist nationalism
                        </div>
                    </div>
                </div> 
                <!-- / panel 1 -->
                
                <!-- panel 2 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab2" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title collapsed">TAB 2</h4>
                        </div>
                    </span>

                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                        <!-- Tab content goes here -->
                        tab 2 content
                        </div>
                    </div>
                </div>
                <!-- / panel 2 -->
                
                <!--  panel 3 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab3" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingThree"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title">TAB 3 </h4>
                        </div>
                    </span>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                          <!-- tab content goes here -->
                           tab 3 content
                          </div>
                        </div>
                      </div>
            </div> <!-- / panel-group -->
             <a class="btn btn-lg btn-info " href="<?php echo site_url('authorize')?>">Login / Register</a>
        </div> <!-- /col-md-4 -->
        
        <div class="col-md-8">
            <!-- begin macbook pro mockup -->
            <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                    <!-- content goes here -->                
                        <div class="tab-featured-image">
                            <div class="tab-content">
                                <div class="tab-pane  in active" id="tab1">
                                        <img src="https://ununsplash.imgix.net/photo-1417024321782-1375735f8987?dpr=2&fit=crop&fm=jpg&h=650&q=75&w=950" alt="tab1" class="img img-responsive">
                                </div>
                                <div class="tab-pane " id="tab2">
                                    
                                        <img src="https://unsplash.imgix.net/uploads/1411724908903377d4696/2e9b0cb2?dpr=2&fit=crop&fm=jpg&h=650&q=75&w=950">
                                    
                                </div>
                                <div class="tab-pane fade" id="tab3">
                                    
                                        <img src="https://ununsplash.imgix.net/photo-1422479516648-9b1f0b6e8da8?dpr=2&fit=crop&fm=jpg&h=650&q=75&w=950" alt="tab1" class="img img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-base"></div>
            </div> <!-- end macbook pro mockup -->



        </div> <!-- / .col-md-8 -->
    </div> <!--/ .row -->
</div> <!-- end sidetab container -->
<style type="text/css">
    body {
    margin-top:60px;
    font-family: 'Montserrat',sans-serif;
}
/* this is just for the demo */





.panel-heading:hover {
    cursor:pointer;
}
.panel-heading {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;    
}

.side-tab:hover {
        cursor: pointer;
    }
    .panel.panel-default {
        border: none;
        box-shadow: none !important;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        
    }
    .panel-heading {
        border: none;
        background-color: #eee;
    
    }
    .panel-body {
        background-color: #f5f5f5;
    }
    .panel-title {
        font-weight: 400;
        color: $white;
    }

/*----------------------------------
    Macbook pro mockup from:
    http://jaredhardy.com/minimal-devices/
    
----------------------------------*/

.md-macbook-pro {
  display: block;
  width: 55.3125em;
  height: 31.875em;
  font-size: 13px;
  margin: 0 auto;

  @media (max-width:1199px){
    font-size: 11px;
  }
  @media (max-width:1024px){
    font-size: 10px;
  }

  @media (max-width:767px){
    font-size: 7px;
  }

  @media (max-width:320px){
    font-size: 5px;
  }

}
.md-macbook-pro .md-lid {
  width: 45em;
  height: 30.625em;
  overflow: hidden;
  margin: 0 auto;
  position: relative;
  border-radius: 1.875em;
  border: solid 0.1875em #cdced1;
  background: #131313;
}
.md-macbook-pro .md-camera {
  width: 0.375em;
  height: 0.375em;
  margin: 0 auto;
  position: relative;
  top: 1.0625em;
  background: #000;
  border-radius: 100%;
  box-shadow: inset 0 -1px 0 rgba(255, 255, 255, 0.25);
}
.md-macbook-pro .md-camera:after {
  content: "";
  display: block;
  width: 0.125em;
  height: 0.125em;
  position: absolute;
  left: 0.125em;
  top: 0.0625em;
  background: #353542;
  border-radius: 100%;
}
.md-macbook-pro .md-screen {
  width: 42.25em;
  height: 26.375em;
  margin: 0 auto;
  position: relative;
  top: 2.0625em;
  // background: #1d1d1d;
  background: #fff;
  overflow: hidden;
}
.md-macbook-pro .md-screen img {
  width: 100%;
}
.md-macbook-pro .md-base {
  width: 100%;
  height: 0.9375em;
  position: relative;
  top: -0.75em;
  background: #c6c7ca;
}
.md-macbook-pro .md-base:after {
  content: "";
  display: block;
  width: 100%;
  height: 0.5em;
  margin: 0 auto;
  position: relative;
  bottom: -0.1875em;
  background: #b9babe;
  border-radius: 0 0 1.25em 1.25em;
}
.md-macbook-pro .md-base:before {
  content: "";
  display: block;
  width: 7.6875em;
  height: 0.625em;
  margin: 0 auto;
  position: relative;
  background: #a6a8ad;
  border-radius: 0 0 0.625em 0.625em;
}
.md-macbook-pro.md-glare .md-lid:after {
  content: "";
  display: block;
  width: 50%;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  border-radius: 0 1.25em 0 0;
  background: -webkit-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: -moz-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: -o-linear-gradient(37deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
  background: linear-gradient(53deg, rgba(255, 255, 255, 0) 50%, rgba(247, 248, 240, 0.025) 50%, rgba(250, 245, 252, 0.08));
}
</style>