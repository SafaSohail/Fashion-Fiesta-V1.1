@include('layouts.header')
<main>
    <style>
        .slider-container {
            width: 100%;
            height: 700px;
            /* Adjust the height as needed */
            overflow: hidden;
            position: relative;
        }

        .slide {
            width: 100%;
            position: relative;
            overflow: auto;
            text-align: center;
            margin: 0;
        }

        .prev-button,
        .next-button {
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
            background: none;
            font-size: 24px;
            /* Adjust the font size as needed */
        }

        .prev-button {
            left: 10px;
        }

        .next-button {
            right: 10px;
        }

        /* Styles for the arrow icons inside the buttons */
        .prev-button span,
        .next-button span {
            display: inline-block;
            width: 24px;
            /* Adjust the width as needed */
            height: 24px;
            /* Adjust the height as needed */
            line-height: 24px;
            /* Vertically center the arrow icon */
            text-align: center;
            font-weight: bold;
            /* Ensure arrow icons are bold */
        }

        .slide img {
            z-index: 1;
            width: 100%;
            /* Adjust the width as needed */
            height: 100%;
            /* Adjust the height as needed */
            object-fit: cover;
            /* Ensures that the image covers the entire container */
        }

        @media (max-width: 768px) {
            .slider-container {
                height: 250px;
                /* Allow the container to adjust its height */
                display: flex;
                flex-direction: row;
                /* Display slides horizontally */
                align-items: flex-start;
                /* Align slides at the top */
                overflow-x: hidden;
                /* Enable horizontal scrolling if needed */
            }

            .slide {
                width: 100%;
                /* Full width for each slide */
                flex: 0 0 auto;
                /* Prevent slides from growing/shrinking */
                display: block;
                /* Reset display to default for mobile */
                text-align: center;
            }

            .slide img {
                max-width: 100%;
                /* Ensure images fit within smaller screens */
                height: auto;
                /* Maintain image aspect ratio */
                object-fit: cover;
            }

            .prev-button span,
            .next-button span {
                display: none;
            }

        }

        .slider-heading {
            position: absolute;
            font-weight: bold;
            top: 48%;
            /* Adjust the top position as needed */
            left: 50%;
            /* Center horizontally */
            transform: translateX(-50%);
            z-index: 2;
            /* Heading text color */
            font-size: 3rem;
            /* Heading font size */
            text-align: center;
            /* Center the heading text */
            color: #1A7A8B;
            /* Background color for heading */
            padding: 10px 20px;
            /* Padding for the heading */
        }

        /* Styles for the slider paragraph */
        .slider-paragraph {
            position: absolute;
            top: 55%;
            /* Adjust the top position as needed */
            left: 50%;
            /* Center horizontally */
            transform: translateX(-50%);
            z-index: 2;
            /* Place the paragraph above slides and buttons */
            color: #fff;
            /* Paragraph text color */
            font-size: 1.2rem;
            /* Paragraph font size */
            text-align: center;
            /* Center the paragraph text */
            color: #1A7A8B;
            /* Background color for paragraph */
            padding: 10px 20px;
            /* Padding for the paragraph */
        }
        
        /* Styles for the slider paragraph */
        .slider-button {
            position: absolute;
            top: 60%;
            /* Adjust the top position as needed */
            left: 50%;
            /* Center horizontally */
            transform: translateX(-50%);
            z-index: 2;
            /* Place the paragraph above slides and buttons */
            color: #fff;
            /* Paragraph text color */
            font-size: 1.2rem;
            /* Paragraph font size */
            text-align: center;
            /* Center the paragraph text */
            color: #1A7A8B;
            /* Background color for paragraph */
            padding: 10px 20px;
            /* Padding for the paragraph */
        }

        @media (max-width: 768px) {
            .slider-heading {
                top: 40%;
                font-size: 1rem;
                /* Adjust the font size for smaller screens */
            }

            .slider-paragraph {
                top: 48%;
                font-size: 0.6rem;
                /* Adjust the font size for smaller screens */
            }
            
            .slider-button {
                top: 55%;
                font-size: 0.6rem;
                /* Adjust the font size for smaller screens */
            }
        }
    </style>
    <div class="slider-container">
        <h1 class="slider-heading">Fashion Fiesta</h1>
        <p class="slider-paragraph">Stitching Dreams</p>
        <p class="slider-button"><a class="btn_1 rounded" href="/order">Generate Order</a></p>
        <div class="slide">
            <img src="{{asset('assets/img/1.jpg')}}" alt="Image 1">
        </div>
        <div class="slide">
            <img src="{{asset('assets/img/2.jpg')}}" alt="Image 2">
        </div>
        <div class="slide">
            <img src="{{asset('assets/img/3.jpg')}}" alt="Image 3">
        </div>
        <div class="slide">
            <img src="{{asset('assets/img/4.jpg')}}" alt="Image 4">
        </div>
        <div class="slide">
            <img src="{{asset('assets/img/5.jpg')}}" alt="Image 5">
        </div>
        <div class="slide">
            <img src="{{asset('assets/img/6.jpg')}}" alt="Image 6">
        </div>
        <div class="slide">
            <img src="{{asset('assets/img/7.jpg')}}" alt="Image 7">
        </div>
        <div class="slide">
            <img src="{{asset('assets/img/8.jpg')}}" alt="Image 8">
        </div>
        <!-- Add more slides as needed -->
        <button class="prev-button" aria-label="Previous">
            <span>&#9664;</span> <!-- Left arrow icon -->
        </button>
        <button class="next-button" aria-label="Next">
            <span>&#9654;</span> <!-- Right arrow icon -->
        </button>
    </div>
    <div class="container container-custom margin_80_0">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Popular Tailors</h2>
        </div>

        <div id="reccomended" class="owl-carousel owl-theme">
            @foreach($tailors as $tailor)
            <div class="item">
                <div class="box_grid">
                    <figure>
                        <a href="{{ route('tailorDesigns.show', ['id' => $tailor->id]) }}"><img src="{{asset('storage/users/'.$tailor->avatar)}}" class="img-fluid" alt="" width="800" height="600"></a>
                        <small>{{ $tailor->name }}</small>
                    </figure>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /carousel -->
        <div class="container container-custom margin_30_95">
            <section class="add_bottom_45">
                <div class="main_title_3">
                    <span><em></em></span>
                    <h2>Tailors</h2>
                </div>
                <div class="row">
                    @foreach($tailors as $tailor)
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <a class="grid_item" href="{{ route('tailorDesigns.show', ['id' => $tailor->id]) }}">
                            <figure>
                                <img style="height: 220px;" src="{{asset('storage/users/'.$tailor->avatar)}}" class="img-fluid" alt="">
                                <div class="info">
                                    <h3>{{ $tailor->name }}</h3>
                                    @if($tailor->pictures)
                                    <p>{{ count($tailor->pictures) }} Designs</p>
                                    @endif
                                </div>
                            </figure>
                        </a>
                        @if ($tailor->tailorReviews->isNotEmpty())
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5>Reviews</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <p class="mb-0">Rating: {{ $tailor->tailorReviews->first()->rating }}</p>
                                    <p class="mb-0">Comment: {{ $tailor->tailorReviews->first()->comment }}</p>
                                </div>
                                <hr class="my-2"> <!-- Add a horizontal rule as a separator -->
                                <!-- Additional reviews can be displayed here -->
                            </div>
                        </div>
                        @else
                        <p>No reviews yet</p>
                        @endif
                    </div>
                    <!-- /grid_item -->
                    @endforeach
                    <hr class="large">
                    <!-- /grid_item -->
                </div>
                <!-- /row -->
            </section>
            <!-- /section -->
        </div>
        <!-- /container -->
        <script>
            const sliderContainer = document.querySelector('.slider-container');
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;
            let currentIndex = 0;
            let touchStartX = 0;
            let touchEndX = 0;

            function showSlide(index) {
                if (index < 0) {
                    currentIndex = totalSlides - 1;
                } else if (index >= totalSlides) {
                    currentIndex = 0;
                }

                slides.forEach((slide, i) => {
                    if (i === currentIndex) {
                        slide.style.display = 'block';
                    } else {
                        slide.style.display = 'none';
                    }
                });
            }

            function nextSlide() {
                currentIndex++;
                showSlide(currentIndex);
            }

            function prevSlide() {
                currentIndex--;
                showSlide(currentIndex);
            }

            // Add event listeners for navigation
            const prevButton = document.querySelector('.prev-button');
            const nextButton = document.querySelector('.next-button');

            if (prevButton && nextButton) {
                prevButton.addEventListener('click', prevSlide);
                nextButton.addEventListener('click', nextSlide);
            } else {
                console.error('Prev or next buttons not found.');
            }

            // Touch slide functionality for mobile devices
            sliderContainer.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
            });

            sliderContainer.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].clientX;
                const swipeThreshold = 50;

                if (touchStartX - touchEndX > swipeThreshold) {
                    nextSlide();
                } else if (touchEndX - touchStartX > swipeThreshold) {
                    prevSlide();
                }
            });

            // Optionally, add auto-rotation
            let autoSlideInterval;

            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            startAutoSlide();
        </script>

</main>

<!-- /main -->
@include('layouts.footer')