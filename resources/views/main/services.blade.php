@include('layouts.header')

<main>
    <section class="hero_in general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Fashion Fiesta</h1>
                <h3 class="fadeInUp">Stitching Dreams</h3>
            </div>
        </div>
    </section>
    <!--/hero_in-->
    <div class="container margin_80_55">
        <div class="main_title_2 text-center">
            <span><em></em></span>
            <h2>Why Choose The Fashion Fiesta</h2>
        </div>
        <div class="row justify-content-center">

            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\10.png') }}" alt="Designer Wear">
                    <h5>Designer Wear: Rs. 1500-2000</h5>
                </div>
            </div>

            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\11.png') }}" alt="Shalwar Kameez">
                    <h5>Shalwar Kameez: Rs. 1200-1500</h5>
                </div>
            </div>
            
            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\12.png') }}" alt="Party Wear">
                    <h5>Party Wear: Rs. 1500-2500</h5>
                </div>
            </div>
            
            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\13.png') }}" alt="Bridal Wear">
                    <h5>Bridal Wear: starting from Rs. 5000</h5>
                </div>
            </div>
            
            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\14.png') }}" alt="Kurta">
                    <h5>Kurta: starting from Rs. 1000<</h5>
                </div>
            </div>
            
            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\16.png') }}" alt="Gowns">
                    <h5>Gowns: starting from Rs. 3000</h5>
                </div>
            </div>
            
            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\17.png') }}" alt="Saree">
                    <h5>Saree: starting from Rs. 3000</h5>
                </div>
            </div>
            
            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\18.png') }}" alt="Lehenga">
                    <h5>Lehenga: starting from Rs. 5000</h5>
                </div>
            </div>
            
            <div class="col-lg-3 text-center">
                <div class="service-item">
                    <img style="height: 250px;" src="{{ URL('..\assets\img\19.png') }}" alt="Kids Shalwar kameez">
                    <h5>Kids Shalwar kameez: starting from Rs. 1500</h5>
                </div>
            </div>

        </div>
        <!--/row-->
    </div>
    <!-- /container -->
</main>
<!--/main-->

@include('layouts.footer')