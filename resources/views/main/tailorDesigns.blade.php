@include('layouts.header')

<main>

    <section class="hero_in tours">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>{{ $tailor->name }}</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- End Map -->

    <div class="container margin_60_35">
        <div class="isotope-wrapper">
            <h1 class="fadeInUp"><span></span>Designs</h1>
            <h4 class="fadeInUp"><span>Specialization: </span>{{$tailor->specialization}}</h1>

            <div class="row">
                @if($tailor->pictures)
                @foreach($tailor->pictures as $images)
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <a class="grid_item">
                        <figure>
                            <img style="height: 220px;" src="{{asset('storage/users/'.$images)}}" class="img-fluid" alt="">
                        </figure>
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <a style="float: right;" class="btn_1 rounded" href="/order/{{ $tailor->id }}">Order Now</a>
        <a class="btn_1 rounded" href="/addwish/{{ $tailor->id }}">
            @if($wishlist != null)
            @if($wishlist->contains('tailorId', $tailor->id))
            Remove From Wishlist
            @else
            Add to Wishlist
            @endif
            @else
            Add to Wishlist
            @endif
        </a>

        @if ($tailor->tailorReviews->isNotEmpty())
        <div class="card">
            <div class="card-header">
                <h5 style="float: right;">Completed Orders: {{$countCompletedOrders}}</h5>
                <h5>Reviews: {{count($tailor->tailorReviews)}}</h5>
            </div>
            <div class="card-body">
                @foreach ($tailor->tailorReviews as $review)
                <div class="mb-4">
                    <h6 class="mb-1">{{ $review->User->name }}</h6>
                    <p class="mb-0">Rating: {{ $review->rating }}</p>
                    <p class="mb-0">Comment: {{ $review->comment }}</p>
                </div>
                <hr class="my-2">
                @endforeach
            </div>
        </div>
        @else
        <p>No reviews yet</p>
        @endif
        <!-- /isotope-wrapper -->
        @if(auth()->user())
        @if (auth()->user()->role=='user' && $countCompletedOrders > 0)
        <form action="{{ route('reviews.store', ['id' => $tailor->id]) }}" method="post" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" name="rating" min="1" max="5" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="comment">Review:</label>
                <textarea name="comment" rows="4" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn_1 rounded">Submit Review</button>
        </form>
        @endif
        @else
        <p class="mt-4">Please <a href="/signin">sign in</a> to add a review.</p>
        @endif
    </div>
    <!-- /container -->
</main>
<!--/main-->

<script>
    function addToCart(url) {
        event.preventDefault();
        window.location.href = url;
    }
</script>

@include('layouts.footer')